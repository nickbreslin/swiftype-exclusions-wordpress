<?php 
/*

external_id, enum       Wordpress post ID
title,       string     post title
author,      string     author name
tags,        string     post tags
body,        text       post body
excerpt,     text       post excerpt
category,    enum       category id
url,         enum       url to the post
image,       enum       first image associated
timestamp,   date       publication date
object_type, enum       type of post (page, post, cpt)
updated_at,  date       date when post was last updated in swiftype

*/

/*
curl -X GET 'https://api.swiftype.com/api/v1/public/engines/search.json' \
-H 'Content-Type: application/json' \
-d '{
  "engine_key": "",
  "q": "search terms here",
  "search_fields": {
    "posts": ["title^3.0", "tags^2.0", "author^2.0", "body", "excerpt"]
  }
}'


*/


error_log('test');

