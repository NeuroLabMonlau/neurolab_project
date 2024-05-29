import pandas as pd
import time
import csv
import pymysql
import bcrypt

def agregar_encabezados():
    nombre_archivo_original = "data.csv"
    nombre_archivo_encabezados = "data_with_headers.csv"

    encabezados = [
        "ID",
        "Nombre",
        "Apellido_1",
        "Apellido_2",
        "IDALU",
        "DNI",
        "CIP",
        "NEE",
        "Curso",
        "F.Nac",
        "Municipio",
        "Direccion",
        "CP",
        "Email",
        "Telefono",
        "Grup_o_Seccio",
        "Nombre_Tutor_1",
        "Apellidos_Tutor_1",
        "Email_Tutor_1",
        "Telefono_Tutor_1",
        "Nombre_Tutor_2",
        "Apellidos_Tutor_2",
        "Email_Tutor_2",
        "Telefono_Tutor_2",
        "Nombre_Tutor_3",
        "Apellidos_Tutor_3",
        "Email_Tutor_3",
        "Telefono_Tutor_3",
        "Pais",
        "Provincia"
    ]

    with open(nombre_archivo_original, 'r', newline='', encoding='utf-16-le') as archivo_original, \
            open(nombre_archivo_encabezados, 'w', newline='', encoding='utf-8') as archivo_encabezados:

        lector_csv = csv.reader(archivo_original, delimiter=',', quotechar='"', quoting=csv.QUOTE_ALL)
        escritor_csv = csv.writer(archivo_encabezados)

        escritor_csv.writerow(encabezados)

        for fila in lector_csv:
            # Quita las comillas triples y el carácter de comillas en cada valor
            fila_limpia = [campo.strip('"""').replace('""', '"') for campo in fila]
            fila_limpia = fila[1:]
            escritor_csv.writerow(fila_limpia)

# Función para insertar datos en la base de datos
def insertar_datos_db():
    # Registra el tiempo de inicio
    tiempo_inicio = time.time()

    try:
        db_connection = pymysql.connect(
            host='212.227.227.190',
            port=3306,
            user='root_neurolab',
            password='$$neurolab!!',
            database='neurolab_project',
            charset='utf8mb4',
            collation='utf8mb4_unicode_ci'
        )

        csv_file = "data_with_headers.csv"
        df = pd.read_csv(csv_file, encoding='utf-8', delimiter=',')

        def clean_value(value):
            return None if pd.isnull(value) or value in ('-', ' ', 'nan', 'NaN', 'NAN', '') else value

        with db_connection.cursor() as cursor:
            for index, row in df.iterrows():
                # Insertar curso si no existe
                # print("IDALU: " + str(row['IDALU']))
                idalu = cursor.execute("SELECT idalu FROM students WHERE idalu = %s", (clean_value(row['IDALU']),))
                if idalu == 1:
                    continue
                if pd.isnull(row['IDALU']) or pd.isnull(row['Curso']):
                    cursor.execute(
                        """
                    INSERT INTO failed_operations (user_id,idalu, name, last_name, last_name2, course_id, date_of_birth, email, dni_nif, cip, address_id, created_at, updated_at, create_user, update_user)
                    VALUES (2,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, now(), now(), 'neurolab-test', 'neurolab-test')
                    """,
                    (
                        clean_value(row['IDALU']), 
                        clean_value(row['Nombre']),
                        clean_value(row['Apellido_1']),
                        clean_value(row['Apellido_2']),
                        clean_value(row['Curso']),
                        clean_value(row['F.Nac']),
                        clean_value(row['Email']),
                        clean_value(row['DNI']),
                        clean_value(row['CIP']),
                        clean_value(row['Direccion'])
                    )
                    )
                    continue
                    
                course = cursor.execute("SELECT course_name FROM courses WHERE course_name = %s", (clean_value(row['Curso']),))


                if course == 0:
                    cursor.execute("INSERT INTO courses (course_name, created_at, updated_at) VALUES (%s, now(), now())", (clean_value(row['Curso'])))
                
                course_id = cursor.execute("SELECT id FROM courses WHERE course_name = %s LIMIT 1",(clean_value(row['Curso'])))
                records = cursor.fetchone()
                course_id = records[0]
                # Obtener o insertar dirección
                cursor.execute(
                    "INSERT INTO addresses (public_road,cp,municipality,province,country,created_at,updated_at) VALUES (%s,%s,%s,%s,%s,now(),now())",
                    (clean_value(row['Direccion']), clean_value(row['CP']), clean_value(row['Municipio']), clean_value(row['Provincia']), clean_value(row['Pais']))
                )
                address_id = cursor.lastrowid
                passw = clean_value(row['Apellido_1'])
                hashed_password = bcrypt.hashpw(passw.encode('utf-8'), bcrypt.gensalt())
                hashed_password = hashed_password.replace(b"$2b$", b"$2y$", 1)
                # Insertar estudiante
                username = clean_value(row['Nombre']) + clean_value(row['Apellido_1'])
                cursor.execute(
                    "INSERT INTO users (username, password, role_id, email, created_at, updated_at, creation_user, update_user) VALUES (%s, %s,3, %s, now(), now(), 1, 1)",
                    (username, hashed_password, clean_value(row['Email']))
                )
                user_id = cursor.lastrowid
                cursor.execute(
                    """
                    INSERT INTO students (user_id, idalu, name, last_name, last_name2, course_id, date_of_birth, email, dni_nif, cip, address_id, created_at, updated_at, create_user, update_user)
                    VALUES (%s,%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, now(), now(), 1, 1)
                    """,
                    (
                        user_id,
                        clean_value(row['IDALU']), 
                        clean_value(row['Nombre']),
                        clean_value(row['Apellido_1']),
                        clean_value(row['Apellido_2']),
                        course_id,
                        clean_value(row['F.Nac']),
                        clean_value(row['Email']),
                        clean_value(row['DNI']),
                        clean_value(row['CIP']),
                        address_id)
                )
                student_id = cursor.lastrowid

                # Insertar tutores
                for i in range(1, 4):
                    tutor_name = clean_value(row[f'Nombre_Tutor_{i}'])
                    if not tutor_name:
                        continue
                    tutor_surnames = clean_value(row[f'Apellidos_Tutor_{i}'])
                    tutor_phone_number = clean_value(row[f'Telefono_Tutor_{i}'])
                    tutor_email = clean_value(row[f'Email_Tutor_{i}'])

                    cursor.execute(
                        "INSERT INTO tutors (name, last_name, phone_number, email) VALUES (%s, %s, %s, %s) ON DUPLICATE KEY UPDATE id = LAST_INSERT_ID(id)",
                        (tutor_name, tutor_surnames, tutor_phone_number, tutor_email)
                    )
                    tutor_id = cursor.lastrowid

                    cursor.execute(
                        "INSERT INTO student_tutor_type_relations (student_id, tutor_id,type_relation_id) VALUES (%s, %s, 1) ON DUPLICATE KEY UPDATE student_id = LAST_INSERT_ID(student_id), tutor_id = LAST_INSERT_ID(tutor_id)",
                        (student_id, tutor_id)
                    )

        # db_connection.commit()

    except pymysql.Error as e:
        print(f"Error al insertar datos en la base de datos: {e}")

    finally:
        if 'db_connection' in locals() and db_connection.open:
            db_connection.close()

        tiempo_fin = time.time()
        tiempo_total = tiempo_fin - tiempo_inicio
        print(f"El script tomó {tiempo_total} segundos en ejecutarse.")

# Ejecutar las funciones
# agregar_encabezados()
insertar_datos_db()