@component('mail::message')
# your post was liked 

{{ $liker->name }} liked your post

@component('mail::button', ['url' => route('post.show',$post)])
View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
