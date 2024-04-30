
<div>
    <div>
        <h1 class="text-3xl font-bold">{{ Auth::user()->username }} </h1> 
        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->username }}"/>
     </div>
    <h1 class="text-3xl font-bold">Información personal</h1>
    <p>CURSO:  {{ $this->getCourse->course_name}}</p>
    <p>IDALU:  {{ $this->getStudent->idalu}}</p>
    <p>DNI:  {{ $this->getStudent->dni_nif}}</p>
    <p>FECHA NACIMIENTO:  {{ $this->getStudent->date_of_birth}}</p>
    <p>EMAIL:  {{ $this->getStudent->email}}</p>
    <p>CALLE:  {{ $this->getAddress->public_road}}</p>
    <p>CP:  {{ $this->getAddress->cp}}</p>
    <p>PROVINCIA:  {{ $this->getAddress->province}}</p>
</div>
