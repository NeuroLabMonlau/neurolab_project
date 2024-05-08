
<div class=" bg-white mx-auto w-full h-full max-w-xl p-8 mt-10">
    <h1 class="text-3xl font-bold text-center  text-black">{{ $this->getStudent->name }} {{$this->getStudent->last_name}} {{$this->getStudent->last_name2}}</h1> 

    <div class="flex justify-center">
        <img class=" mt-5 w-48 h-48 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->username }}"/>
     </div>
    <h1 class="text-3xl font-bold mb-2 text-black">Información personal</h1>
    <p class=" mb-2 text-black">CURSO:  {{ $this->getCourse->course_name}}</p>
    <p class=" mb-2 text-black">IDALU:  {{ $this->getStudent->idalu}}</p>
    <p class=" mb-2 text-black">DNI:  {{ $this->getStudent->dni_nif}}</p>
    <p class=" mb-2 text-black">FECHA NACIMIENTO:  {{ $this->getStudent->date_of_birth}}</p>
    <p class=" mb-2 text-black">EMAIL:  {{ $this->getStudent->email}}</p>
    <p class=" mb-2 text-black">CALLE:  {{ $this->getAddress->public_road}}</p>
    <p class=" mb-2 text-black">CP:  {{ $this->getAddress->cp}}</p>
    <p class=" mb-2 text-black">PROVINCIA:  {{ $this->getAddress->province}}</p>
</div>
