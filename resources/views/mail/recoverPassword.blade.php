<div style="width: 100%; display:block;">
<h2>{{ trans('labels.EcommercePasswordRecovery') }}</h2>
<p>
	<strong>{{ trans('labels.Hi') }} {{ $existUser->first_name }} {{ $existUser->last_name }}!</strong><br>
	{{ trans('labels.recoverPasswordEmailText') }}<br>
	{{ trans('labels.Yourpasswordis') }} <strong>{{ $existUser->password }}</strong><br><br>
	<strong>{{ trans('labels.Sincerely') }},</strong><br>
	{{ trans('labels.regardsForThanks') }}
</p>
</div>
