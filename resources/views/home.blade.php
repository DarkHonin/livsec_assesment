@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-light">
            @if(Auth::user())
                <groceries-component />
            @else
                <h1 id="liv-security---technical-assessment">Liv Security - Technical assessment</h1>
                <h4 id="project-author-william-gourley">Project Author: William Gourley</h4>
                <h2 id="premise">Premise</h2>
                <p>In conjunction with a job search one of the opportunities have provided me with this project as technical assessment in my skills regarding php, Laravel and Vue.</p>
                <p>Along with user registration and authentication the endeavor also requires a list of groceries each containing; Name, quantity description and checked status; tied to each unique user. These items should offer CRUD operations via an API for manipulation by any form of fronted.</p>
                <h2 id="notes">Notes</h2>
                <p>It has been some time since I have touched on php and took some time to get the project spun up. What had been a simple include library when I last looked, Laravel has become more complex leveraging Docker to serve all its infrastructure such as Database and Mail server.</p>
                <p>In addition to the increased complexity in its deployment there is also integration for 3rd party javascript library integration into the Blade template engine. This confused me a little as I am use to the system only rendering and serving html without any dynamic elements present.</p>
                <h2 id="conclusion">Conclusion</h2>
                <p>I enjoyed working on the project more than setting up the environment, but once the environment had been configured it was smooth sailing. I implemented the boilerplate authentication system and built the rest from there.</p>
                <p>Email verification is disabled at this time seeing as this project should never see a public deployment and doesn’t need that security yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
