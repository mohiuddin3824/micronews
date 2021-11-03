@php
    
    $headers = App\Models\Header::first();
    $seos = DB::table('s_e_o_s')->first();
@endphp

<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'TheHolyMedia')
<img class="img-thumbnail" src="{{ asset($headers->header_logo) }}" alt="{{$seos->meta_title}}">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
