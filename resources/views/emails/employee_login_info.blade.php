@component('mail::message')
# Introduction

@component('mail::panel')
<h3>This is your login info:</h3>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Password:</strong> {{ $password }}</p>
<p></p>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
