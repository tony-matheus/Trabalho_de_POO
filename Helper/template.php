<?php

function template_html($name, $param){

    $tempalte = array(
        "list-insert" => "
            <div style='padding: 1em'>
                <div class='media text-muted pt-3'>
                    <div class='button-plus'></div>
                    <div class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'>
                        <div class='d-flex justify-content-between align-items-center w-100'>
                            <strong class='text-gray-dark'>Full Name</strong>
                            <a href='#'>Follow</a>
                        </div>
                        <span class='d-block'>@username</span>
                    </div>
                </div>
            </div>
        "
    );
}