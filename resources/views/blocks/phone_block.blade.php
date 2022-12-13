<a {{ isset($class) ? 'class='.$class : '' }} href="+7{{ substr(str_replace(['-','(',')','+',' '],'',$phone) ,1) }}">{{ isset($name) ? $name : $phone }}</a>
