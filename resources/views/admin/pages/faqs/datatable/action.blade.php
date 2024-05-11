@adminCan('faqs.edit')
<a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-success mr-2 mb-1 btn-sm" data-toggle="tooltip" data-placement="top"
   title="Show">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         class="feather feather-edit-3">
        <path d="M12 20h9"></path>
        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
    </svg>
</a>
@endadminCan


@adminCan('faqs.delete')
<a class="btn btn-danger text-light btn-sm mb-1"
   data-bs-toggle="modal" href="#exampleModalToggle-{{$faq->id}}" role="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         class="feather feather-trash-2">
        <polyline points="3 6 5 6 21 6"></polyline>
        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
        <line x1="10" y1="11" x2="10" y2="17"></line>
        <line x1="14" y1="11" x2="14" y2="17"></line>
    </svg>
</a>

<div class="modal fade" id="exampleModalToggle-{{$faq->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalToggleLabel">
                    {{ TranslationHelper::translate('delete' , 'admin') }} {{ $faq->question }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.faq.destroy',$faq->id) }}" method="POST" class="btn_delete">
                    @csrf
                    @method('DELETE')
                        {{ TranslationHelper::translate('are_you_sure_you_want_to_delete' , 'admin') }} {{ $faq->question }} 
                    <br/>
                    <hr>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-arrow-alt-circle-left"></i>{{ TranslationHelper::translate('cancel' , 'admin') }}
                    </button>
                    <button class="btn btn-danger submit">
                        <i class="fas fa-trash"></i> {{ TranslationHelper::translate('delete' , 'admin') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endadminCan



