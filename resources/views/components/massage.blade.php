@if (Session::has('flash_message'))
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-success">
                    {{Session::get('flash_message')}}
                </div>
            </div>
        </div>
    </div>
@endif<?php
