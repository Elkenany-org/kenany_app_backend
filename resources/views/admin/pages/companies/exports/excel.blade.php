<table>
    <thead>
        <tr>
            <th>name english</th>
            <th>name arabic</th>
            <th>manager name</th>
            <th>manager email</th>

            <th>longitude</th>
            <th>latitude</th>
            <th>address english</th>
            <th>address arabic</th>
            <th>short descrition english</th>
            {{-- <th>short descrition arabic</th> --}}
            {{-- <th>about</th> --}}
            <th>rate</th>

            <th>city</th>
            <th>country</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
            <tr>
                <td width="30">{{ $company->getTranslation('name','en') }}</td>
                <td width="30">{{ $company->getTranslation('name','ar') }}</td>

                <td width="30">{{ $company->manage_phone }}</td>
                <td width="30">{{ $company->manage_email }}</td>

                <td width="20">{{ $company->longitude }}</td>
                <td width="20">{{ $company->latitude }}</td>
                <td width="60">{{ $company->getTranslation('address','en') }}</td>
                <td width="60">{{ $company->getTranslation('address','ar') }}</td>
                <td width="120">{{ $company->getTranslation('short_desc','en') }}</td>
                {{-- <td width="200">{{ $company->getTranslation('short_desc','ar') }}</td> --}}
                {{-- <td width="60">{{ $company?->about }}</td> --}}
                <td width="30">{{ $company->rate }}</td>

                <td width="30">{{ $company->city?->name }}</td>
                <td width="30">{{ $company->country?->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>