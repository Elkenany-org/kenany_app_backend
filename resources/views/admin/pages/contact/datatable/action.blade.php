<a href="" class="btn btn-success btn-sm mr-2" data-toggle="tooltip" data-placement="top"
   title="Show">
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
</svg>
</a>

@adminCan('contact.delete')
<a class="btn btn-danger text-light btn-sm"
   data-bs-toggle="modal" href="#exampleModalToggle-{{$contact->id}}" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         class="feather feather-trash-2">
        <polyline points="3 6 5 6 21 6"></polyline>
        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
        <line x1="10" y1="11" x2="10" y2="17"></line>
        <line x1="14" y1="11" x2="14" y2="17"></line>
    </svg>
</a>

<div class="modal fade" id="exampleModalToggle-{{$contact->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalToggleLabel">
                    {{ TranslationHelper::translate('delete', 'admin') }} {{ $contact->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.contact.destroy',$contact->id) }}" method="POST" class="btn_delete">
                    @csrf
                    @method('DELETE')
                        {{ TranslationHelper::translate('are_you_sure_you_want_to_delete' , 'admin') }} {{ $contact->name }} ??
                    <br/>
                    <hr>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                        {{ TranslationHelper::translate('cancel', 'admin') }} 
                    </button>
                    <button class="btn btn-danger submit">
                        <i class="fas fa-trash"></i> 
                        {{ TranslationHelper::translate('delete', 'admin') }} 
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endadminCan




