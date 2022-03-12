<div>
    {{-- <a wire:click="detail('{{ $data }}')" class="text-dark">
        <i class="far fa-eye" style="font-size: 18px !important;"></i>
    </a> --}}

    <a wire:click="edit('{{ $data }}')" class="text-primary me-3">
        <i class="far fa-edit" style="font-size: 18px !important;"></i>
    </a>

    <a href="" class="text-danger">
        <i class="far fa-trash-alt" style="font-size: 18px !important;"></i>
    </a>
</div>
