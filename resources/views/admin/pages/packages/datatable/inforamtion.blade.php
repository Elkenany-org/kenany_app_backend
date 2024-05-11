<span> {{ $consumer->restrictions->count() }} </span>
<a class=" text-light btn-sm" data-bs-toggle="modal" href="#restrictions-{{$consumer->id}}" role="button">
    <button class="btn btn-danger btn-sm">
        {{ TranslationHelper::translate('show' , 'admin') }}
    </button>
</a>

<div class="modal fade" id="restrictions-{{$consumer->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalToggleLabel"> {{ $consumer->name }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center"> {{ TranslationHelper::translate('restrictions' , 'admin') }}  </h3>
                <p> {{ $consumer->id_number }} </p>

                <table class="table">
                    <thead> 
                        <th>{{ TranslationHelper::translate('restriction_num' , 'admin') }}</th>
                        <th>{{ TranslationHelper::translate('facility_name' , 'admin') }}</th>
                        <th>{{ TranslationHelper::translate('facility_num' , 'admin') }}</th>
                        <th>{{ TranslationHelper::translate('amount' , 'admin') }}</th>
                        <th>{{ TranslationHelper::translate('status' , 'admin') }}</th>
                      
                    </thead>
                    <tbody>
                        @foreach($consumer->restrictions as $key => $restrication)
                        <tr>
                            <td> {{ $restrication->code }} </td>
                            <td> {{ $restrication->pos?->company?->name }} </td>
                            <td> {{ $restrication->pos?->company?->code }} </td>
                            <td> {{ $restrication->amount }} </td>
                            <td> {{ TranslationHelper::translate($restrication->status->name , 'admin')  }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</div>
