<!DOCTYPE html>
<html>
    <head>
        <title>{{ Theme::place('title') }}</title>
        <meta charset="utf-8">
        {{ Theme::partial('seostuff') }} 
        {{ Theme::partial('defaultcss') }} 
        {{ Theme::asset()->styles() }} 
    </head>
    <body>
        <div id="template-wrapper" class="boxed">
            {{ Theme::partial('header') }} 
            <div id="site-wrapper">
                {{ Theme::place('content') }} 
                {{ Theme::partial('subscribe') }} 
            </div>
            {{ Theme::partial('footer') }} 
        </div>
        {{ Theme::partial('defaultjs') }} 
        {{ Theme::partial('analytic') }} 
    </body>
</html>