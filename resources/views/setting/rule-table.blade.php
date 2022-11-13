<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Order</th>
        <th scope="col">Attribute</th>
        <th scope="col">Rules</th>
    </tr>
    </thead>
    <tbody>

    @foreach($setting->expected_columns as $order => $columnName)
        @php
            $column = $setting->columns[$columnName]
        @endphp
        <tr scope="row">
            <td>{{$order}}</td>
            <td>{{$columnName}}</td>
            <td>
                {{implode(', ', $column['rules'])}}
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
