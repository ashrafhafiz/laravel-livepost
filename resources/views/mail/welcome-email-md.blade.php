@component("mail::message")
# Welcome {{ $user->name }}!!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::panel')
This is panel.
@endcomponent

## Table Component

@component('mail::table')
| Laravel  | Table   |
| -------- | ------- |
| Col 2    | Center  |
@endcomponent

Thanks, <br>
{{ config('app.name') }}

@endcomponent
