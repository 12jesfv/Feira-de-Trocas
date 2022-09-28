@if ($create==1 || $show==0)
  @include('livewire.componentes.projeto.create')
@else
  @include('livewire.componentes.projeto.show')
@endif
