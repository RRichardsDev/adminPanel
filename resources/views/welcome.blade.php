@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="row" id="landing-top-border"></div>
            <div class="row justify-content-center">
                <h1 id="landingTitle">postChat</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-11">                
                    <h4 id="landingVersion">V.1.0</h4>
                </div>
            </div>
        </div>
        
        <div class="col-md-12" id="landing-middle-spacer" >
            <div class="row">
                <div class="col">                
                    <p id="landing-section-title">Features of this application:
                        <ul id="landing-section-body">
                            <li>Send and Recieve messages.</li>
                            <li>Make group chats.</li>
                            <li>Create and edit your profile.</li>
                            <li>Make public posts.</li>
                        </ul>
                    </p>
                </div>
                <div class="col border-left border-dark pl-25">                
                    <p id="landing-section-title">Skills shown in this project:
                        <ul id="landing-section-body">
                            <li><b>Bootstrap</b> CSS framework.</li>
                            <li><b>Laravel</b> application framework.</li>
                            <li><b>jQuery</b> and <b>AJAX</b> requests.</li>
                            <li>Custom <b>CSS</b> styling.</li>
                            <li>Database querying using <b>mySQL</b></li>
                        </ul>
                    </p>
                </div>
                <div class="col border-left border-dark pl-25">                
                    <p id="landing-section-title">Future features:
                        <ul id="landing-section-body">
                            <li>Real-time message updating using <b>livewire</b>.</li>
                            <li>Photo albums.</li>
                        </ul>
                    </p>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
