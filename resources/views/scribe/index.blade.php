<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Farmer Registration Pilot</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "https://farmer-pilot.test";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.22.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.22.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-agent-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="agent-management">
                    <a href="#agent-management">Agent management</a>
                </li>
                                    <ul id="tocify-subheader-agent-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="agent-management-POSTapi-agent-search">
                                <a href="#agent-management-POSTapi-agent-search">Search Agent</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-GETapi-agents">
                                <a href="#agent-management-GETapi-agents">Get all agents</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-POSTapi-agent-register">
                                <a href="#agent-management-POSTapi-agent-register">Create a new agent</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-GETapi-agent--id-">
                                <a href="#agent-management-GETapi-agent--id-">Get Agent</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-POSTapi-agent--id--update">
                                <a href="#agent-management-POSTapi-agent--id--update">POST api/agent/{id}/update</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-GETapi-agent--agent_id--farmers">
                                <a href="#agent-management-GETapi-agent--agent_id--farmers">Get Agent Registered Farmers</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-auth-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="auth-management">
                    <a href="#auth-management">Auth Management</a>
                </li>
                                    <ul id="tocify-subheader-auth-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="auth-management-POSTapi-login">
                                <a href="#auth-management-POSTapi-login">Login user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-management-POSTapi-logout">
                                <a href="#auth-management-POSTapi-logout">Logout user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-management-POSTapi-refresh">
                                <a href="#auth-management-POSTapi-refresh">Refresh token</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-data-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="data-management">
                    <a href="#data-management">Data Management</a>
                </li>
                                    <ul id="tocify-subheader-data-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="data-management-GETapi-farmers">
                                <a href="#data-management-GETapi-farmers">Get all farmers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="data-management-GETapi-farmer--id-">
                                <a href="#data-management-GETapi-farmer--id-">Get farmer</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-fpo-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="fpo-management">
                    <a href="#fpo-management">FPO management</a>
                </li>
                                    <ul id="tocify-subheader-fpo-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="fpo-management-GETapi-fpos">
                                <a href="#fpo-management-GETapi-fpos">Get all FPOs.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-GETapi-fpos-summary">
                                <a href="#fpo-management-GETapi-fpos-summary">Get FPOs summary.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-POSTapi-fpo-register">
                                <a href="#fpo-management-POSTapi-fpo-register">Store a newly created FPO.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-GETapi-fpo--id-">
                                <a href="#fpo-management-GETapi-fpo--id-">Get FPO by id.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-POSTapi-fpo--id--update">
                                <a href="#fpo-management-POSTapi-fpo--id--update">Update FPO by id.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-GETapi-fpo--id--agents">
                                <a href="#fpo-management-GETapi-fpo--id--agents">Get FPOs Agents.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-GETapi-fpo--id--farmers">
                                <a href="#fpo-management-GETapi-fpo--id--farmers">Get FPO Farmers.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-GETapi-fpo-coordinates">
                                <a href="#fpo-management-GETapi-fpo-coordinates">Get FPO Coordinates</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-farmer-profile" class="tocify-header">
                <li class="tocify-item level-1" data-unique="farmer-profile">
                    <a href="#farmer-profile">Farmer Profile</a>
                </li>
                                    <ul id="tocify-subheader-farmer-profile" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="farmer-profile-POSTapi-farmer-register">
                                <a href="#farmer-profile-POSTapi-farmer-register">Register Farmer</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: July 6, 2023</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>https://farmers.nauticaltech.ug/</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="agent-management">Agent management</h1>

    <p>APIs for managing agents</p>

                                <h2 id="agent-management-POSTapi-agent-search">Search Agent</h2>

<p>
</p>

<p>This endpoint allows a user to search for a specific agent by agent code</p>

<span id="example-requests-POSTapi-agent-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/agent/search" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"agent_id\": \"AGT001\",
    \"first_name\": \"John\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/search"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "agent_id": "AGT001",
    "first_name": "John"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-agent-search">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;first_name&quot;: &quot;John&quot;,
        &quot;last_name&quot;: &quot;Doe&quot;,
        &quot;email&quot;: &quot;&quot;,
        &quot;phone_number&quot;: &quot;256XXXXXXXXX&quot;,
        &quot;age&quot;: &quot;30&quot;,
        &quot;residence&quot;: &quot;Kampala&quot;,
        &quot;referee_name&quot;: &quot;Jane Doe&quot;,
        &quot;referee_phone_number&quot;: &quot;08012345678&quot;,
        &quot;designation&quot;: &quot;Agro Extension Worker&quot;,
        &quot;photo&quot;: &quot;http://localhost:8000/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
        &quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Validation error&quot;,
    &quot;data&quot;: {
        &quot;agent_id&quot;: [
            &quot;The agent id field is required.&quot;
        ],
        &quot;first_name&quot;: [
            &quot;The first name field is required.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Agent not found&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-agent-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-agent-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agent-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-agent-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agent-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-agent-search" data-method="POST"
      data-path="api/agent/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-agent-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-agent-search"
                    onclick="tryItOut('POSTapi-agent-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-agent-search"
                    onclick="cancelTryOut('POSTapi-agent-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-agent-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/agent/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-agent-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-agent-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>agent_id</code></b>&nbsp;&nbsp;
<small>required</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="agent_id"                data-endpoint="POSTapi-agent-search"
               value="AGT001"
               data-component="body">
    <br>
<p>The id of the agent. Example: <code>AGT001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>required</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-agent-search"
               value="John"
               data-component="body">
    <br>
<p>The first name of the agent. Example: <code>John</code></p>
        </div>
        </form>

                    <h2 id="agent-management-GETapi-agents">Get all agents</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get all agents</p>

<span id="example-requests-GETapi-agents">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/agents" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agents"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-agents">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Agents retrieved successfully&quot;,
    &quot;data&quot;: {
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;first_name&quot;: &quot;John&quot;,
                &quot;last_name&quot;: &quot;Doe&quot;,
                &quot;email&quot;: &quot;&quot;,
                &quot;phone_number&quot;: &quot;08012345678&quot;,
                &quot;age&quot;: &quot;30&quot;,
                &quot;residence&quot;: &quot;Kampala&quot;,
                &quot;referee_name&quot;: &quot;Jane Doe&quot;,
                &quot;referee_phone_number&quot;: &quot;08012345678&quot;,
                &quot;designation&quot;: &quot;Agro Extension Worker&quot;,
                &quot;photo&quot;: null,
                &quot;created_at&quot;: &quot;2021-06-27T14:56:12.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2021-06-27T14:56:12.000000Z&quot;
            }
        ],
        &quot;first_page_url&quot;: &quot;http://localhost:8000/api/agents?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;last_page_url&quot;: &quot;http://localhost:8000/api/agents?page=1&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/agents?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: null,
        &quot;path&quot;: &quot;http://localhost:8000/api/agents&quot;,
        &quot;per_page&quot;: 15,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 1,
        &quot;total&quot;: 1
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;No agents found&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-agents" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-agents"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agents"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-agents" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agents">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-agents" data-method="GET"
      data-path="api/agents"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-agents', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-agents"
                    onclick="tryItOut('GETapi-agents');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-agents"
                    onclick="cancelTryOut('GETapi-agents');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-agents"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/agents</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-agents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-agents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-agents"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="agent-management-POSTapi-agent-register">Create a new agent</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-agent-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/agent/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"first_name\": \"John\",
    \"last_name\": \"Doe\",
    \"email\": \"rory.mraz@example.net\",
    \"phone_number\": \"256XXXXXXXXX\",
    \"age\": \"30\",
    \"gender\": \"libero\",
    \"residence\": \"Kampala\",
    \"referee_name\": \"Jane Doe\",
    \"referee_phone_number\": \"08012345678\",
    \"designation\": \"Agro Extension Worker\",
    \"created_by\": 5,
    \"fpo_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "first_name": "John",
    "last_name": "Doe",
    "email": "rory.mraz@example.net",
    "phone_number": "256XXXXXXXXX",
    "age": "30",
    "gender": "libero",
    "residence": "Kampala",
    "referee_name": "Jane Doe",
    "referee_phone_number": "08012345678",
    "designation": "Agro Extension Worker",
    "created_by": 5,
    "fpo_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-agent-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Agent created successfully&quot;,
    &quot;data&quot;: {
        &quot;first_name&quot;: &quot;John&quot;,
        &quot;last_name&quot;: &quot;Doe&quot;,
        &quot;email&quot;: &quot;&quot;,
        &quot;phone_number&quot;: &quot;256XXXXXXXXX&quot;,
        &quot;age&quot;: &quot;30&quot;,
        &quot;residence&quot;: &quot;Kampala&quot;,
        &quot;referee_name&quot;: &quot;Jane Doe&quot;,
        &quot;referee_phone_number&quot;: &quot;08012345678&quot;,
        &quot;designation&quot;: &quot;Agro Extension Worker&quot;,
        &quot;photo&quot;: &quot;http://localhost:8000/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
        &quot;updated_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
        &quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
        &quot;id&quot;: 1
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Validation error&quot;,
    &quot;data&quot;: {
        &quot;first_name&quot;: [
            &quot;The first name field is required.&quot;
        ],
        &quot;last_name&quot;: [
            &quot;The last name field is required.&quot;
        ],
        &quot;phone_number&quot;: [
            &quot;The phone number field is required.&quot;
        ],
        &quot;age&quot;: [
            &quot;The age field is required.&quot;
        ],
        &quot;residence&quot;: [
            &quot;The residence field is required.&quot;
        ],
        &quot;referee_name&quot;: [
            &quot;The referee name field is required.&quot;
        ],
        &quot;referee_phone_number&quot;: [
            &quot;The referee phone number field is required.&quot;
        ],
        &quot;designation&quot;: [
            &quot;The designation field is required.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Bad request&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Forbidden&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Not found&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (405):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Method not allowed&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Server error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-agent-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-agent-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agent-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-agent-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agent-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-agent-register" data-method="POST"
      data-path="api/agent/register"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-agent-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-agent-register"
                    onclick="tryItOut('POSTapi-agent-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-agent-register"
                    onclick="cancelTryOut('POSTapi-agent-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-agent-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/agent/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-agent-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-agent-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-agent-register"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-agent-register"
               value="John"
               data-component="body">
    <br>
<p>The first name of the agent. Example: <code>John</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-agent-register"
               value="Doe"
               data-component="body">
    <br>
<p>The last name of the agent. Example: <code>Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-agent-register"
               value="rory.mraz@example.net"
               data-component="body">
    <br>
<p>The email of the agent. Example: Example: <code>rory.mraz@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-agent-register"
               value="256XXXXXXXXX"
               data-component="body">
    <br>
<p>The phone number of the agent. Example: <code>256XXXXXXXXX</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>age</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="age"                data-endpoint="POSTapi-agent-register"
               value="30"
               data-component="body">
    <br>
<p>The age of the agent. Example: <code>30</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-agent-register"
               value="libero"
               data-component="body">
    <br>
<p>Example: <code>libero</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>residence</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="residence"                data-endpoint="POSTapi-agent-register"
               value="Kampala"
               data-component="body">
    <br>
<p>The residence of the agent. Example: <code>Kampala</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>referee_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="referee_name"                data-endpoint="POSTapi-agent-register"
               value="Jane Doe"
               data-component="body">
    <br>
<p>The referee name of the agent. Example: <code>Jane Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>referee_phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="referee_phone_number"                data-endpoint="POSTapi-agent-register"
               value="08012345678"
               data-component="body">
    <br>
<p>The referee phone number of the agent. Example: <code>08012345678</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>designation</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="designation"                data-endpoint="POSTapi-agent-register"
               value="Agro Extension Worker"
               data-component="body">
    <br>
<p>The designation of the agent. Example: <code>Agro Extension Worker</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>created_by</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="created_by"                data-endpoint="POSTapi-agent-register"
               value="5"
               data-component="body">
    <br>
<p>Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="fpo_id"                data-endpoint="POSTapi-agent-register"
               value="1"
               data-component="body">
    <br>
<p>Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="agent-management-GETapi-agent--id-">Get Agent</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get a specific agent</p>

<span id="example-requests-GETapi-agent--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/agent/facere" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/facere"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-agent--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Agent retrieved successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;first_name&quot;: &quot;John&quot;,
        &quot;last_name&quot;: &quot;Doe&quot;,
        &quot;email&quot;: &quot;&quot;,
        &quot;phone_number&quot;: &quot;256XXXXXXXXX&quot;,
        &quot;age&quot;: &quot;30&quot;,
        &quot;residence&quot;: &quot;Kampala&quot;,
        &quot;referee_name&quot;: &quot;Jane Doe&quot;,
        &quot;referee_phone_number&quot;: &quot;08012345678&quot;,
        &quot;designation&quot;: &quot;Agro Extension Worker&quot;,
        &quot;photo&quot;: &quot;http://localhost:8000/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
        &quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Agent not found&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-agent--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-agent--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agent--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-agent--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agent--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-agent--id-" data-method="GET"
      data-path="api/agent/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-agent--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-agent--id-"
                    onclick="tryItOut('GETapi-agent--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-agent--id-"
                    onclick="cancelTryOut('GETapi-agent--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-agent--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/agent/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-agent--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-agent--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-agent--id-"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-agent--id-"
               value="facere"
               data-component="url">
    <br>
<p>The ID of the agent. Example: <code>facere</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>agent</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="agent"                data-endpoint="GETapi-agent--id-"
               value="1"
               data-component="url">
    <br>
<p>The id of the agent. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="agent-management-POSTapi-agent--id--update">POST api/agent/{id}/update</h2>

<p>
</p>



<span id="example-requests-POSTapi-agent--id--update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/agent/quia/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/quia/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-agent--id--update">
</span>
<span id="execution-results-POSTapi-agent--id--update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-agent--id--update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agent--id--update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-agent--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agent--id--update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-agent--id--update" data-method="POST"
      data-path="api/agent/{id}/update"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-agent--id--update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-agent--id--update"
                    onclick="tryItOut('POSTapi-agent--id--update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-agent--id--update"
                    onclick="cancelTryOut('POSTapi-agent--id--update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-agent--id--update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/agent/{id}/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-agent--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-agent--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-agent--id--update"
               value="quia"
               data-component="url">
    <br>
<p>The ID of the agent. Example: <code>quia</code></p>
            </div>
                    </form>

                    <h2 id="agent-management-GETapi-agent--agent_id--farmers">Get Agent Registered Farmers</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get all farmers registered by a specific agent</p>

<span id="example-requests-GETapi-agent--agent_id--farmers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/agent/1/farmers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/1/farmers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-agent--agent_id--farmers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;message&quot;: &quot;Farmers retrieved successfully&quot;,
&quot;data&quot;: {
&quot;current_page&quot;: 1,
&quot;data&quot;: [
{
&quot;id&quot;: 1,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;email&quot;: &quot;&quot;,
...
}
],
&quot;first_page_url&quot;: &quot;http://localhost:8000/api/farmers?page=1&quot;,
&quot;from&quot;: 1,
&quot;last_page&quot;: 1,
&quot;last_page_url&quot;: &quot;http://localhost:8000/api/farmers?page=1&quot;,
&quot;links&quot;: [
{
&quot;url&quot;: null,
&quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
&quot;active&quot;: false
},
{
&quot;url&quot;: &quot;http://localhost:8000/api/farmers?page=1&quot;,
&quot;label&quot;: &quot;1&quot;,
&quot;active&quot;: true
},
{
&quot;url&quot;: null,
&quot;label&quot;: &quot;Next &amp;raquo;&quot;,
&quot;active&quot;: false
}
],
&quot;next_page_url&quot;: null,
&quot;path&quot;: &quot;http://localhost:8000/api/farmers&quot;,
&quot;per_page&quot;: 10,
&quot;prev_page_url&quot;: null,
&quot;to&quot;: 1,
&quot;total&quot;: 1
}
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;No farmers found&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-agent--agent_id--farmers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-agent--agent_id--farmers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agent--agent_id--farmers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-agent--agent_id--farmers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agent--agent_id--farmers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-agent--agent_id--farmers" data-method="GET"
      data-path="api/agent/{agent_id}/farmers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-agent--agent_id--farmers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-agent--agent_id--farmers"
                    onclick="tryItOut('GETapi-agent--agent_id--farmers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-agent--agent_id--farmers"
                    onclick="cancelTryOut('GETapi-agent--agent_id--farmers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-agent--agent_id--farmers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/agent/{agent_id}/farmers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-agent--agent_id--farmers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-agent--agent_id--farmers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-agent--agent_id--farmers"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>agent_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="agent_id"                data-endpoint="GETapi-agent--agent_id--farmers"
               value="1"
               data-component="url">
    <br>
<p>The id of the agent. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="auth-management">Auth Management</h1>

    <p>APIs for managing authentication</p>

                                <h2 id="auth-management-POSTapi-login">Login user</h2>

<p>
</p>

<p>This endpoint allows a user to login</p>

<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"waldo.jones@example.org\",
    \"password\": \"D{3vS:2Hsf\\\\NhN1pX\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "waldo.jones@example.org",
    "password": "D{3vS:2Hsf\\NhN1pX"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;message&quot;: &quot;User login successfully.&quot;,
&quot;data&quot;: {
&quot;id&quot;: 1,
&quot;name&quot;: &quot;John Doe&quot;,
&quot;email&quot;: &quot;john@test.com&quot;,
&quot;email_verified_at&quot;: null,
&quot;phone_number&quot;: &quot;256700000000&quot;,
&quot;created_at&quot;: &quot;2021-06-27T14:56:04.000000Z&quot;,
&quot;updated_at&quot;: &quot;2021-06-27T14:56:04.000000Z&quot;,
}
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthorised.&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;email&quot;: [
            &quot;The email field is required.&quot;
        ],
        &quot;password&quot;: [
            &quot;The password field is required.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="waldo.jones@example.org"
               data-component="body">
    <br>
<p>The email address or phone number of the user Example: <code>waldo.jones@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="D{3vS:2Hsf\NhN1pX"
               data-component="body">
    <br>
<p>The password of the user Example: <code>D{3vS:2Hsf\NhN1pX</code></p>
        </div>
        </form>

                    <h2 id="auth-management-POSTapi-logout">Logout user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to logout</p>

<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;User logged out successfully.&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Unauthorised.&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="auth-management-POSTapi-refresh">Refresh token</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to refresh their token</p>

<span id="example-requests-POSTapi-refresh">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/refresh" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/refresh"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-refresh">
</span>
<span id="execution-results-POSTapi-refresh" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-refresh"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-refresh"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-refresh" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-refresh">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-refresh" data-method="POST"
      data-path="api/refresh"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-refresh', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-refresh"
                    onclick="tryItOut('POSTapi-refresh');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-refresh"
                    onclick="cancelTryOut('POSTapi-refresh');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-refresh"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/refresh</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-refresh"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-refresh"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="data-management">Data Management</h1>

    <p>APIs for managing farmer profile</p>

                                <h2 id="data-management-GETapi-farmers">Get all farmers</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get all farmers</p>

<span id="example-requests-GETapi-farmers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/farmers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-farmers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;current_page&quot;: 1,
&quot;data&quot;: [
{
&quot;id&quot;: 1,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,

}
],
&quot;first_page_url&quot;: &quot;http://localhost:8000/api/farmers?page=1&quot;,
&quot;from&quot;: 1,
&quot;last_page&quot;: 1,
&quot;last_page_url&quot;: &quot;http://localhost:8000/api/farmers?page=1&quot;,
&quot;links&quot;: [
{
&quot;url&quot;: null,
&quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
&quot;active&quot;: false
},
{
&quot;url&quot;: &quot;http://localhost:8000/api/farmers?page=1&quot;,
&quot;label&quot;: &quot;1&quot;,
&quot;active&quot;: true
},
{
&quot;url&quot;: null,
&quot;label&quot;: &quot;Next &amp;raquo;&quot;,
&quot;active&quot;: false
}
],
&quot;next_page_url&quot;: null,
&quot;path&quot;: &quot;http://localhost:8000/api/farmers&quot;,
&quot;per_page&quot;: 10,
&quot;prev_page_url&quot;: null,
&quot;to&quot;: 1,
&quot;total&quot;: 1
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-farmers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farmers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farmers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farmers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farmers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farmers" data-method="GET"
      data-path="api/farmers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farmers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farmers"
                    onclick="tryItOut('GETapi-farmers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farmers"
                    onclick="cancelTryOut('GETapi-farmers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farmers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farmers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farmers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-farmers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-farmers"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="data-management-GETapi-farmer--id-">Get farmer</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get a farmer</p>

<span id="example-requests-GETapi-farmer--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/farmer/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmer/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-farmer--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;id&quot;: 1,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,

}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Farmer not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-farmer--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farmer--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farmer--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farmer--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farmer--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farmer--id-" data-method="GET"
      data-path="api/farmer/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farmer--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farmer--id-"
                    onclick="tryItOut('GETapi-farmer--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farmer--id-"
                    onclick="cancelTryOut('GETapi-farmer--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farmer--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farmer/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farmer--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-farmer--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-farmer--id-"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-farmer--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the farmer. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="fpo-management">FPO management</h1>

    <p>APIs for managing FPOs</p>

                                <h2 id="fpo-management-GETapi-fpos">Get all FPOs.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to fetch all FPOs.</p>

<span id="example-requests-GETapi-fpos">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/fpos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-fpos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;fpo_name&quot;: &quot;Root FPO&quot;,
            &quot;district&quot;: &quot;Kampala&quot;,
            &quot;county&quot;: &quot;Kampala&quot;,
            &quot;sub_county&quot;: &quot;Kampala&quot;,
            &quot;parish&quot;: &quot;Kampala&quot;,
            &quot;village&quot;: &quot;Kampala&quot;,
            &quot;fpo_cordinates&quot;: null,
            &quot;main_crop&quot;: &quot;Maize&quot;,
            &quot;fpo_contact_name&quot;: &quot;Maurice Kamugisha&quot;,
            &quot;contact_phone_number&quot;: &quot;256781456492&quot;,
            &quot;contact_email&quot;: &quot;maurice@innovationvillage.co.ug&quot;,
            &quot;core_staff_count&quot;: &quot;10&quot;,
            &quot;core_staff_positions&quot;: &quot;Chairman, Vice Chairman, Secretary, Treasurer, Accountant, Field Officer, Field Officer, Field Officer, Field Officer, Field Officer&quot;,
            &quot;registration_status&quot;: &quot;Registered&quot;,
            &quot;fpo_membership_number&quot;: &quot;495&quot;,
            &quot;fpo_female_membership&quot;: &quot;295&quot;,
            &quot;fpo_male_youth&quot;: &quot;120&quot;,
            &quot;fpo_female_youth&quot;: &quot;175&quot;,
            &quot;fpo_field_agents&quot;: &quot;10&quot;,
            &quot;Cert_of_Inc&quot;: null,
            &quot;created_by&quot;: 1,
            &quot;created_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;fpo_name&quot;: &quot;Ankole farmers cooperative&quot;,
            &quot;district&quot;: &quot;Sheema&quot;,
            &quot;county&quot;: null,
            &quot;sub_county&quot;: &quot;Sheema&quot;,
            &quot;parish&quot;: &quot;Sheema&quot;,
            &quot;village&quot;: &quot;Sheema&quot;,
            &quot;fpo_cordinates&quot;: &quot;0.3530341,32.6148231&quot;,
            &quot;main_crop&quot;: &quot;coffee maize beans bananas vegetable soya_beans&quot;,
            &quot;fpo_contact_name&quot;: &quot;Joseph wandera&quot;,
            &quot;contact_phone_number&quot;: &quot;&quot;,
            &quot;contact_email&quot;: &quot;&quot;,
            &quot;core_staff_count&quot;: &quot;10&quot;,
            &quot;core_staff_positions&quot;: &quot;&quot;,
            &quot;registration_status&quot;: &quot;no&quot;,
            &quot;fpo_membership_number&quot;: &quot;1000&quot;,
            &quot;fpo_male_membership&quot;: &quot;600&quot;,
            &quot;fpo_female_membership&quot;: &quot;400&quot;,
            &quot;fpo_male_youth&quot;: &quot;&quot;,
            &quot;fpo_female_youth&quot;: &quot;&quot;,
            &quot;fpo_field_agents&quot;: &quot;20&quot;,
            &quot;Cert_of_Inc&quot;: null,
            &quot;created_by&quot;: 1,
            &quot;created_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost:8000/api/fpos?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost:8000/api/fpos?page=1&quot;,
    &quot;links&quot;: [
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
            &quot;active&quot;: false
        },
        {
            &quot;url&quot;: &quot;http://localhost:8000/api/fpos?page=1&quot;,
            &quot;label&quot;: &quot;1&quot;,
            &quot;active&quot;: true
        },
        {
            &quot;url&quot;: null,
            &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
            &quot;active&quot;: false
        }
    ],
    &quot;next_page_url&quot;: null,
    &quot;path&quot;: &quot;http://localhost:8000/api/fpos&quot;,
    &quot;per_page&quot;: 15,
    &quot;prev_page_url&quot;: null,
    &quot;to&quot;: 2,
    &quot;total&quot;: 2
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No FPOs found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-fpos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-fpos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-fpos"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-fpos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-fpos">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-fpos" data-method="GET"
      data-path="api/fpos"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-fpos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-fpos"
                    onclick="tryItOut('GETapi-fpos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-fpos"
                    onclick="cancelTryOut('GETapi-fpos');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-fpos"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/fpos</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-fpos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-fpos"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-fpos"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="fpo-management-GETapi-fpos-summary">Get FPOs summary.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to fetch a summary of all FPOs.</p>

<span id="example-requests-GETapi-fpos-summary">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/fpos/summary" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpos/summary"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-fpos-summary">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;FPOs retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;fpo_name&quot;: &quot;FPO 1&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;fpo_name&quot;: &quot;FPO 2&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No FPOs found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-fpos-summary" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-fpos-summary"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-fpos-summary"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-fpos-summary" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-fpos-summary">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-fpos-summary" data-method="GET"
      data-path="api/fpos/summary"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-fpos-summary', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-fpos-summary"
                    onclick="tryItOut('GETapi-fpos-summary');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-fpos-summary"
                    onclick="cancelTryOut('GETapi-fpos-summary');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-fpos-summary"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/fpos/summary</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-fpos-summary"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-fpos-summary"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="fpo-management-POSTapi-fpo-register">Store a newly created FPO.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to store a newly created FPO.</p>

<span id="example-requests-POSTapi-fpo-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/fpo/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"fpo_name\": \"quo\",
    \"district\": \"tenetur\",
    \"county\": \"quibusdam\",
    \"sub_county\": \"velit\",
    \"parish\": \"dolor\",
    \"village\": \"eos\",
    \"main_crop\": \"laboriosam\",
    \"fpo_contact_name\": \"aut\",
    \"contact_phone_number\": \"corrupti\",
    \"contact_email\": \"bschuster@example.org\",
    \"core_staff_count\": 13,
    \"core_staff_positions\": \"sunt\",
    \"registration_status\": \"amet\",
    \"fpo_membership_number\": \"tenetur\",
    \"fpo_male_membership\": \"quaerat\",
    \"fpo_female_membership\": \"amet\",
    \"fpo_male_youth\": \"quas\",
    \"fpo_female_youth\": \"et\",
    \"fpo_field_agents\": \"dolorum\",
    \"created_by\": 6
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "fpo_name": "quo",
    "district": "tenetur",
    "county": "quibusdam",
    "sub_county": "velit",
    "parish": "dolor",
    "village": "eos",
    "main_crop": "laboriosam",
    "fpo_contact_name": "aut",
    "contact_phone_number": "corrupti",
    "contact_email": "bschuster@example.org",
    "core_staff_count": 13,
    "core_staff_positions": "sunt",
    "registration_status": "amet",
    "fpo_membership_number": "tenetur",
    "fpo_male_membership": "quaerat",
    "fpo_female_membership": "amet",
    "fpo_male_youth": "quas",
    "fpo_female_youth": "et",
    "fpo_field_agents": "dolorum",
    "created_by": 6
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-fpo-register">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;FPO created successfully&quot;,
    &quot;data&quot;: {
        &quot;fpo_name&quot;: &quot;FPO 1&quot;,
        &quot;district&quot;: &quot;FPO 1 district&quot;,
        &quot;county&quot;: &quot;FPO 1 county&quot;,
        &quot;sub_county&quot;: &quot;FPO 1 sub county&quot;,
        &quot;parish&quot;: &quot;FPO 1 parish&quot;,
        &quot;village&quot;: &quot;FPO 1 village&quot;,
        &quot;main_crop&quot;: &quot;FPO 1 main crop&quot;,
        &quot;fpo_contact_name&quot;: &quot;FPO 1 contact name&quot;,
        &quot;contact_phone_number&quot;: &quot;FPO 1 contact phone number&quot;,
        &quot;contact_email&quot;: &quot;FPO 1 contact email&quot;,
        &quot;core_staff_count&quot;: 1,
        &quot;core_staff_positions&quot;: &quot;FPO 1 core staff positions&quot;,
        &quot;registration_status&quot;: &quot;FPO 1 registration status&quot;,
        &quot;fpo_membership_number&quot;: &quot;FPO 1 membership number&quot;,
        &quot;fpo_male_membership&quot;: &quot;600&quot;,
        &quot;fpo_female_membership&quot;: &quot;400&quot;,
        &quot;fpo_male_youth&quot;: &quot;&quot;,
        &quot;fpo_female_youth&quot;: &quot;&quot;,
        &quot;fpo_field_agents&quot;: &quot;20&quot;,
        &quot;Cert_of_Inc&quot;: null,
        &quot;created_by&quot;: 1,
        &quot;created_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: false,
&quot;message&quot;: &quot;Validation error&quot;,
&quot;data&quot;: {
&quot;fpo_name&quot;: [
&quot;The fpo name field is required.&quot;
],
&quot;district&quot;: [
&quot;The district field is required.&quot;
],
&quot;county&quot;: [
&quot;The county field is required.&quot;
],
&quot;sub_county&quot;: [
&quot;The sub county field is required.&quot;
],
&quot;parish&quot;: [
&quot;The parish field is required.&quot;
],
&quot;village&quot;: [
&quot;The village field is required.&quot;
],
&quot;main_crop&quot;: [
&quot;The main crop field is required.&quot;
],
&quot;fpo_contact_name&quot;: [
&quot;The fpo contact name field is required.&quot;
],
&quot;contact_phone_number&quot;: [
&quot;The contact phone number field is required.&quot;
],
&quot;contact_email&quot;: [
&quot;The contact email field is required.&quot;
],
&quot;core_staff_count&quot;: [
&quot;The core staff count field is required.&quot;
],
&quot;core_staff_positions&quot;: [
&quot;The core staff positions field is required.&quot;
],
&quot;registration_status&quot;: [
&quot;The registration status field is required.&quot;
],
&quot;fpo_membership_number&quot;: [
&quot;The fpo membership number field is required.&quot;
],
}
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-fpo-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-fpo-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-fpo-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-fpo-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-fpo-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-fpo-register" data-method="POST"
      data-path="api/fpo/register"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-fpo-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-fpo-register"
                    onclick="tryItOut('POSTapi-fpo-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-fpo-register"
                    onclick="cancelTryOut('POSTapi-fpo-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-fpo-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/fpo/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-fpo-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-fpo-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-fpo-register"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_name"                data-endpoint="POSTapi-fpo-register"
               value="quo"
               data-component="body">
    <br>
<p>The name of the FPO. Example: <code>quo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="district"                data-endpoint="POSTapi-fpo-register"
               value="tenetur"
               data-component="body">
    <br>
<p>The district of the FPO. Example: <code>tenetur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="county"                data-endpoint="POSTapi-fpo-register"
               value="quibusdam"
               data-component="body">
    <br>
<p>The county of the FPO. Example: <code>quibusdam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sub_county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sub_county"                data-endpoint="POSTapi-fpo-register"
               value="velit"
               data-component="body">
    <br>
<p>The sub county of the FPO. Example: <code>velit</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parish</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="parish"                data-endpoint="POSTapi-fpo-register"
               value="dolor"
               data-component="body">
    <br>
<p>The parish of the FPO. Example: <code>dolor</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>village</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="village"                data-endpoint="POSTapi-fpo-register"
               value="eos"
               data-component="body">
    <br>
<p>The village of the FPO. Example: <code>eos</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>main_crop</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="main_crop"                data-endpoint="POSTapi-fpo-register"
               value="laboriosam"
               data-component="body">
    <br>
<p>The main crop of the FPO. Example: <code>laboriosam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_contact_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_contact_name"                data-endpoint="POSTapi-fpo-register"
               value="aut"
               data-component="body">
    <br>
<p>The contact name of the FPO. Example: <code>aut</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact_phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact_phone_number"                data-endpoint="POSTapi-fpo-register"
               value="corrupti"
               data-component="body">
    <br>
<p>The contact phone number of the FPO. Example: <code>corrupti</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact_email"                data-endpoint="POSTapi-fpo-register"
               value="bschuster@example.org"
               data-component="body">
    <br>
<p>The contact email of the FPO. Example: <code>bschuster@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>core_staff_count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="core_staff_count"                data-endpoint="POSTapi-fpo-register"
               value="13"
               data-component="body">
    <br>
<p>The number of core staff of the FPO. Example: <code>13</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>core_staff_positions</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="core_staff_positions"                data-endpoint="POSTapi-fpo-register"
               value="sunt"
               data-component="body">
    <br>
<p>The positions of the core staff of the FPO. Example: <code>sunt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>registration_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="registration_status"                data-endpoint="POSTapi-fpo-register"
               value="amet"
               data-component="body">
    <br>
<p>The registration status of the FPO. Example: <code>amet</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_membership_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_membership_number"                data-endpoint="POSTapi-fpo-register"
               value="tenetur"
               data-component="body">
    <br>
<p>The membership number of the FPO. Example: <code>tenetur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_male_membership</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_male_membership"                data-endpoint="POSTapi-fpo-register"
               value="quaerat"
               data-component="body">
    <br>
<p>The male membership number of the FPO. Example: <code>quaerat</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_female_membership</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_female_membership"                data-endpoint="POSTapi-fpo-register"
               value="amet"
               data-component="body">
    <br>
<p>The female membership number of the FPO. Example: <code>amet</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_male_youth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_male_youth"                data-endpoint="POSTapi-fpo-register"
               value="quas"
               data-component="body">
    <br>
<p>The male youth membership number of the FPO. Example: <code>quas</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_female_youth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_female_youth"                data-endpoint="POSTapi-fpo-register"
               value="et"
               data-component="body">
    <br>
<p>The female youth membership number of the FPO. Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_field_agents</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_field_agents"                data-endpoint="POSTapi-fpo-register"
               value="dolorum"
               data-component="body">
    <br>
<p>The number of field agents of the FPO. Example: <code>dolorum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>created_by</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="created_by"                data-endpoint="POSTapi-fpo-register"
               value="6"
               data-component="body">
    <br>
<p>Example: <code>6</code></p>
        </div>
        </form>

                    <h2 id="fpo-management-GETapi-fpo--id-">Get FPO by id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to fetch a FPO by id.</p>

<span id="example-requests-GETapi-fpo--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/fpo/explicabo" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/explicabo"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-fpo--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;message&quot;: &quot;FPO retrieved successfully&quot;,
 {
&quot;id&quot;: 1,
&quot;fpo_name&quot;: &quot;Root FPO&quot;,
&quot;district&quot;: &quot;Kampala&quot;,
&quot;county&quot;: &quot;Kampala&quot;,
&quot;sub_county&quot;: &quot;Kampala&quot;,
&quot;parish&quot;: &quot;Kampala&quot;,
&quot;village&quot;: &quot;Kampala&quot;,
&quot;fpo_cordinates&quot;: null,
&quot;main_crop&quot;: &quot;Maize&quot;,
&quot;fpo_contact_name&quot;: &quot;Maurice Kamugisha&quot;,
&quot;contact_phone_number&quot;: &quot;256781456492&quot;,
&quot;contact_email&quot;: &quot;maurice@innovationvillage.co.ug&quot;,
&quot;core_staff_count&quot;: &quot;10&quot;,
&quot;core_staff_positions&quot;: &quot;Chairman, Vice Chairman, Secretary, Treasurer, Accountant, Field Officer,r&quot;,
&quot;registration_status&quot;: &quot;Registered&quot;,
&quot;fpo_membership_number&quot;: &quot;495&quot;,
&quot;fpo_female_membership&quot;: &quot;295&quot;,
&quot;fpo_male_youth&quot;: &quot;120&quot;,
&quot;fpo_female_youth&quot;: &quot;175&quot;,
&quot;fpo_field_agents&quot;: &quot;10&quot;,
&quot;Cert_of_Inc&quot;: null,
&quot;created_by&quot;: 1,
&quot;created_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;,
&quot;updated_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;
}
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;FPO not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-fpo--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-fpo--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-fpo--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-fpo--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-fpo--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-fpo--id-" data-method="GET"
      data-path="api/fpo/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-fpo--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-fpo--id-"
                    onclick="tryItOut('GETapi-fpo--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-fpo--id-"
                    onclick="cancelTryOut('GETapi-fpo--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-fpo--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/fpo/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-fpo--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-fpo--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-fpo--id-"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-fpo--id-"
               value="explicabo"
               data-component="url">
    <br>
<p>The id of the FPO. Example: <code>explicabo</code></p>
            </div>
                    </form>

                    <h2 id="fpo-management-POSTapi-fpo--id--update">Update FPO by id.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to update a FPO by id.</p>

<span id="example-requests-POSTapi-fpo--id--update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/fpo/accusantium/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"fpo_name\": \"ex\",
    \"district\": \"debitis\",
    \"county\": \"consequuntur\",
    \"sub_county\": \"sed\",
    \"parish\": \"nemo\",
    \"village\": \"hic\",
    \"main_crop\": \"tempore\",
    \"fpo_contact_name\": \"rerum\",
    \"contact_phone_number\": \"iste\",
    \"contact_email\": \"broderick72@example.com\",
    \"core_staff_count\": 16,
    \"core_staff_positions\": \"fugit\",
    \"registration_status\": \"et\",
    \"fpo_membership_number\": \"sed\",
    \"fpo_male_membership\": \"aut\",
    \"fpo_female_membership\": \"doloremque\",
    \"fpo_male_youth\": \"in\",
    \"fpo_female_youth\": \"optio\",
    \"fpo_field_agents\": \"quia\",
    \"created_by\": 19
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/accusantium/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "fpo_name": "ex",
    "district": "debitis",
    "county": "consequuntur",
    "sub_county": "sed",
    "parish": "nemo",
    "village": "hic",
    "main_crop": "tempore",
    "fpo_contact_name": "rerum",
    "contact_phone_number": "iste",
    "contact_email": "broderick72@example.com",
    "core_staff_count": 16,
    "core_staff_positions": "fugit",
    "registration_status": "et",
    "fpo_membership_number": "sed",
    "fpo_male_membership": "aut",
    "fpo_female_membership": "doloremque",
    "fpo_male_youth": "in",
    "fpo_female_youth": "optio",
    "fpo_field_agents": "quia",
    "created_by": 19
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-fpo--id--update">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;FPO updated successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;fpo_name&quot;: &quot;Root FPO&quot;,
        &quot;district&quot;: &quot;Kampala&quot;,
        &quot;county&quot;: &quot;Kampala&quot;,
        &quot;sub_county&quot;: &quot;Kampala&quot;,
        &quot;parish&quot;: &quot;Kampala&quot;,
        &quot;village&quot;: &quot;Kampala&quot;,
        &quot;fpo_cordinates&quot;: null,
        &quot;main_crop&quot;: &quot;Maize&quot;,
        &quot;fpo_contact_name&quot;: &quot;Maurice Kamugisha&quot;,
        &quot;contact_phone_number&quot;: &quot;256781456492&quot;,
        &quot;contact_email&quot;: &quot;maurice@innovationvillage.co.ug&quot;,
        &quot;core_staff_count&quot;: &quot;10&quot;,
        &quot;core_staff_positions&quot;: &quot;Chairman, Vice Chairman, Secretary, Treasurer, Accountant, Field Officer,r&quot;,
        &quot;registration_status&quot;: &quot;Registered&quot;,
        &quot;fpo_membership_number&quot;: &quot;495&quot;,
        &quot;fpo_female_membership&quot;: &quot;295&quot;,
        &quot;fpo_male_youth&quot;: &quot;120&quot;,
        &quot;fpo_female_youth&quot;: &quot;175&quot;,
        &quot;fpo_field_agents&quot;: &quot;10&quot;,
        &quot;Cert_of_Inc&quot;: null,
        &quot;created_by&quot;: 1,
        &quot;created_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-07-06T09:12:42.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Validation error&quot;,
    &quot;data&quot;: {
        &quot;fpo_name&quot;: [
            &quot;The fpo name field is required.&quot;
        ],
        &quot;district&quot;: [
            &quot;The district field is required.&quot;
        ],
        &quot;county&quot;: [
            &quot;The county field is required.&quot;
        ],
        &quot;sub_county&quot;: [
            &quot;The sub county field is required.&quot;
        ],
        &quot;parish&quot;: [
            &quot;The parish field is required.&quot;
        ],
        &quot;village&quot;: [
            &quot;The village field is required.&quot;
        ],
        &quot;main_crop&quot;: [
            &quot;The main crop field is required.&quot;
        ],
        &quot;fpo_member_count&quot;: [
            &quot;The fpo member count field is required.&quot;
        ],
        &quot;fpo_contact_name&quot;: [
            &quot;The fpo contact name field is required.&quot;
        ],
        &quot;contact_phone_number&quot;: [
            &quot;The contact phone number field is required.&quot;
        ],
        &quot;created_by&quot;: [
            &quot;The created by field is required.&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;FPO not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-fpo--id--update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-fpo--id--update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-fpo--id--update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-fpo--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-fpo--id--update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-fpo--id--update" data-method="POST"
      data-path="api/fpo/{id}/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-fpo--id--update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-fpo--id--update"
                    onclick="tryItOut('POSTapi-fpo--id--update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-fpo--id--update"
                    onclick="cancelTryOut('POSTapi-fpo--id--update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-fpo--id--update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/fpo/{id}/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-fpo--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-fpo--id--update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-fpo--id--update"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-fpo--id--update"
               value="accusantium"
               data-component="url">
    <br>
<p>The id of the FPO. Example: <code>accusantium</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_name"                data-endpoint="POSTapi-fpo--id--update"
               value="ex"
               data-component="body">
    <br>
<p>The name of the FPO. Example: <code>ex</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="district"                data-endpoint="POSTapi-fpo--id--update"
               value="debitis"
               data-component="body">
    <br>
<p>The district of the FPO. Example: <code>debitis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="county"                data-endpoint="POSTapi-fpo--id--update"
               value="consequuntur"
               data-component="body">
    <br>
<p>The county of the FPO. Example: <code>consequuntur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sub_county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sub_county"                data-endpoint="POSTapi-fpo--id--update"
               value="sed"
               data-component="body">
    <br>
<p>The sub county of the FPO. Example: <code>sed</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parish</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="parish"                data-endpoint="POSTapi-fpo--id--update"
               value="nemo"
               data-component="body">
    <br>
<p>The parish of the FPO. Example: <code>nemo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>village</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="village"                data-endpoint="POSTapi-fpo--id--update"
               value="hic"
               data-component="body">
    <br>
<p>The village of the FPO. Example: <code>hic</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>main_crop</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="main_crop"                data-endpoint="POSTapi-fpo--id--update"
               value="tempore"
               data-component="body">
    <br>
<p>The main crop of the FPO. Example: <code>tempore</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_contact_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_contact_name"                data-endpoint="POSTapi-fpo--id--update"
               value="rerum"
               data-component="body">
    <br>
<p>The contact name of the FPO. Example: <code>rerum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact_phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact_phone_number"                data-endpoint="POSTapi-fpo--id--update"
               value="iste"
               data-component="body">
    <br>
<p>The contact phone number of the FPO. Example: <code>iste</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact_email"                data-endpoint="POSTapi-fpo--id--update"
               value="broderick72@example.com"
               data-component="body">
    <br>
<p>The contact email of the FPO. Example: <code>broderick72@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>core_staff_count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="core_staff_count"                data-endpoint="POSTapi-fpo--id--update"
               value="16"
               data-component="body">
    <br>
<p>The number of core staff of the FPO. Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>core_staff_positions</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="core_staff_positions"                data-endpoint="POSTapi-fpo--id--update"
               value="fugit"
               data-component="body">
    <br>
<p>The positions of the core staff of the FPO. Example: <code>fugit</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>registration_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="registration_status"                data-endpoint="POSTapi-fpo--id--update"
               value="et"
               data-component="body">
    <br>
<p>The registration status of the FPO. Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_membership_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_membership_number"                data-endpoint="POSTapi-fpo--id--update"
               value="sed"
               data-component="body">
    <br>
<p>The membership number of the FPO. Example: <code>sed</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_male_membership</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_male_membership"                data-endpoint="POSTapi-fpo--id--update"
               value="aut"
               data-component="body">
    <br>
<p>The male membership number of the FPO. Example: <code>aut</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_female_membership</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_female_membership"                data-endpoint="POSTapi-fpo--id--update"
               value="doloremque"
               data-component="body">
    <br>
<p>The female membership number of the FPO. Example: <code>doloremque</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_male_youth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_male_youth"                data-endpoint="POSTapi-fpo--id--update"
               value="in"
               data-component="body">
    <br>
<p>The male youth membership number of the FPO. Example: <code>in</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_female_youth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_female_youth"                data-endpoint="POSTapi-fpo--id--update"
               value="optio"
               data-component="body">
    <br>
<p>The female youth membership number of the FPO. Example: <code>optio</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_field_agents</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_field_agents"                data-endpoint="POSTapi-fpo--id--update"
               value="quia"
               data-component="body">
    <br>
<p>The number of field agents of the FPO. Example: <code>quia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>created_by</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="created_by"                data-endpoint="POSTapi-fpo--id--update"
               value="19"
               data-component="body">
    <br>
<p>Example: <code>19</code></p>
        </div>
        </form>

                    <h2 id="fpo-management-GETapi-fpo--id--agents">Get FPOs Agents.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to fetch all agents of a FPO.</p>

<span id="example-requests-GETapi-fpo--id--agents">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/fpo/enim/agents" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/enim/agents"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-fpo--id--agents">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;current_page&quot;: 1,
&quot;data&quot;: [
{
&quot;id&quot;: 1,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;phone_number&quot;: &quot;256700000000&quot;,
&quot;fpo_id&quot;: 1,
&quot;created_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;,
&quot;updated_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;
},
{
&quot;id&quot;: 2,
&quot;first_name&quot;: &quot;Jane&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;phone_number&quot;: &quot;256700000000&quot;,
&quot;fpo_id&quot;: 1,
&quot;created_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;,
&quot;updated_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;
}
],
&quot;first_page_url&quot;: &quot;http://localhost:8000/api/fpos/1/agents?page=1&quot;,
&quot;from&quot;: 1,
&quot;last_page&quot;: 1,
&quot;last_page_url&quot;: &quot;http://localhost:8000/api/fpos/1/agents?page=1&quot;,
&quot;links&quot;: [
{
&quot;url&quot;: null,
&quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
&quot;active&quot;: false
},
{
&quot;url&quot;: &quot;http://localhost:8000/api/fpos/1/agents?page=1&quot;,
&quot;label&quot;: &quot;1&quot;,
&quot;active&quot;: true
},
{
&quot;url&quot;: null,
&quot;label&quot;: &quot;Next &amp;raquo;&quot;,
&quot;active&quot;: false
}
],
&quot;next_page_url&quot;: null,
&quot;path&quot;: &quot;http://localhost:8000/api/fpos/1/agents&quot;,
&quot;per_page&quot;: 15,
&quot;prev_page_url&quot;: null,
&quot;to&quot;: 2,
&quot;total&quot;: 2
}
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No agents found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-fpo--id--agents" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-fpo--id--agents"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-fpo--id--agents"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-fpo--id--agents" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-fpo--id--agents">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-fpo--id--agents" data-method="GET"
      data-path="api/fpo/{id}/agents"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-fpo--id--agents', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-fpo--id--agents"
                    onclick="tryItOut('GETapi-fpo--id--agents');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-fpo--id--agents"
                    onclick="cancelTryOut('GETapi-fpo--id--agents');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-fpo--id--agents"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/fpo/{id}/agents</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-fpo--id--agents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-fpo--id--agents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-fpo--id--agents"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-fpo--id--agents"
               value="enim"
               data-component="url">
    <br>
<p>The id of the FPO. Example: <code>enim</code></p>
            </div>
                    </form>

                    <h2 id="fpo-management-GETapi-fpo--id--farmers">Get FPO Farmers.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to fetch all farmers of a FPO.</p>

<span id="example-requests-GETapi-fpo--id--farmers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/fpo/voluptatem/farmers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/voluptatem/farmers"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-fpo--id--farmers">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;current_page&quot;: 1,
&quot;data&quot;: [
{
&quot;id&quot;: 1,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;phone_number&quot;: &quot;256700000000&quot;,
&quot;fpo_id&quot;: 1,
&quot;created_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;,
&quot;updated_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;
},
{
&quot;id&quot;: 2,
&quot;first_name&quot;: &quot;Jane&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;phone_number&quot;: &quot;256700000000&quot;,
&quot;fpo_id&quot;: 1,
&quot;created_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;,
&quot;updated_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;
}
],
&quot;first_page_url&quot;: &quot;http://localhost:8000/api/fpos/1/farmers?page=1&quot;,
&quot;from&quot;: 1,
&quot;last_page&quot;: 1,
&quot;last_page_url&quot;: &quot;http://localhost:8000/api/fpos/1/farmers?page=1&quot;,
&quot;links&quot;: [
{
&quot;url&quot;: null,
&quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
&quot;active&quot;: false
},
{
&quot;url&quot;: &quot;http://localhost:8000/api/fpos/1/farmers?page=1&quot;,
&quot;label&quot;: &quot;1&quot;,
&quot;active&quot;: true
},
{
&quot;url&quot;: null,
&quot;label&quot;: &quot;Next &amp;raquo;&quot;,
&quot;active&quot;: false
}
],
&quot;next_page_url&quot;: null,
&quot;path&quot;: &quot;http://localhost:8000/api/fpos/1/farmers&quot;,
&quot;per_page&quot;: 15,
&quot;prev_page_url&quot;: null,
&quot;to&quot;: 2,
&quot;total&quot;: 2
}
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;This action is unauthorized.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No farmers found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-fpo--id--farmers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-fpo--id--farmers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-fpo--id--farmers"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-fpo--id--farmers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-fpo--id--farmers">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-fpo--id--farmers" data-method="GET"
      data-path="api/fpo/{id}/farmers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-fpo--id--farmers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-fpo--id--farmers"
                    onclick="tryItOut('GETapi-fpo--id--farmers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-fpo--id--farmers"
                    onclick="cancelTryOut('GETapi-fpo--id--farmers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-fpo--id--farmers"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/fpo/{id}/farmers</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-fpo--id--farmers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-fpo--id--farmers"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-fpo--id--farmers"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-fpo--id--farmers"
               value="voluptatem"
               data-component="url">
    <br>
<p>The id of the FPO. Example: <code>voluptatem</code></p>
            </div>
                    </form>

                    <h2 id="fpo-management-GETapi-fpo-coordinates">Get FPO Coordinates</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to fetch the coordinates of all FPOs.</p>

<span id="example-requests-GETapi-fpo-coordinates">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/fpo/coordinates" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/coordinates"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-fpo-coordinates">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;FPOs coordinates retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;fpo_name&quot;: &quot;FPO 1&quot;,
            &quot;fpo_cordinates&quot;: &quot;0.347596,32.582520&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;fpo_name&quot;: &quot;FPO 2&quot;,
            &quot;fpo_cordinates&quot;: &quot;0.347596,32.582520&quot;
        }
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;No FPOs found&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-fpo-coordinates" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-fpo-coordinates"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-fpo-coordinates"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-fpo-coordinates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-fpo-coordinates">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-fpo-coordinates" data-method="GET"
      data-path="api/fpo/coordinates"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-fpo-coordinates', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-fpo-coordinates"
                    onclick="tryItOut('GETapi-fpo-coordinates');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-fpo-coordinates"
                    onclick="cancelTryOut('GETapi-fpo-coordinates');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-fpo-coordinates"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/fpo/coordinates</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-fpo-coordinates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-fpo-coordinates"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="farmer-profile">Farmer Profile</h1>

    <p>APIs for managing farmer profile</p>

                                <h2 id="farmer-profile-POSTapi-farmer-register">Register Farmer</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to register a farmer</p>

<span id="example-requests-POSTapi-farmer-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/farmer/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"first_name\": \"John\",
    \"last_name\": \"Doe\",
    \"dob\": \"1990-01-01\",
    \"gender\": \"est\",
    \"education_level\": \"Primary\",
    \"phone_number\": \"0789123456\",
    \"id_number\": \"CM12345678\",
    \"marital_status\": \"Married\",
    \"district\": \"Kampala\",
    \"county\": \"Makindye\",
    \"sub_county\": \"Kibuye\",
    \"parish\": \"Kibuye\",
    \"village\": \"Kibuye\",
    \"fpo_id\": 0,
    \"farmer_cordinates\": \"0.0000,0.0000\",
    \"next_of_kin\": \"Jane Doe\",
    \"next_of_kin_contact\": \"0789123456\",
    \"next_of_kin_relationship\": \"Wife\",
    \"male_members_in_household\": 2,
    \"female_members_in_household\": 4,
    \"members_above_18\": 4,
    \"children_below_5\": 2,
    \"school_going_children\": 2,
    \"head_of_family\": \"John Doe\",
    \"how_much_do_you_earn_from_agricultural_activities\": \"100000\",
    \"how_much_do_you_earn_from_non_agricultural_activities\": \"100000\",
    \"do_you_have_an_account_with_an_FI\": \"Yes\",
    \"farm_size\": \"2\",
    \"farm_size_under_agriculture\": \"2\",
    \"land_ownership\": \"Owned\",
    \"type_of_farming\": \"Crop\",
    \"crops_grown\": \"Maize\",
    \"animals_kept\": \"Cattle\",
    \"estimated_produce_value_last_season\": \"100000\",
    \"estimated_produce_value_this_season\": \"100000\",
    \"data_captured_by\": \"1\",
    \"agent_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmer/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "first_name": "John",
    "last_name": "Doe",
    "dob": "1990-01-01",
    "gender": "est",
    "education_level": "Primary",
    "phone_number": "0789123456",
    "id_number": "CM12345678",
    "marital_status": "Married",
    "district": "Kampala",
    "county": "Makindye",
    "sub_county": "Kibuye",
    "parish": "Kibuye",
    "village": "Kibuye",
    "fpo_id": 0,
    "farmer_cordinates": "0.0000,0.0000",
    "next_of_kin": "Jane Doe",
    "next_of_kin_contact": "0789123456",
    "next_of_kin_relationship": "Wife",
    "male_members_in_household": 2,
    "female_members_in_household": 4,
    "members_above_18": 4,
    "children_below_5": 2,
    "school_going_children": 2,
    "head_of_family": "John Doe",
    "how_much_do_you_earn_from_agricultural_activities": "100000",
    "how_much_do_you_earn_from_non_agricultural_activities": "100000",
    "do_you_have_an_account_with_an_FI": "Yes",
    "farm_size": "2",
    "farm_size_under_agriculture": "2",
    "land_ownership": "Owned",
    "type_of_farming": "Crop",
    "crops_grown": "Maize",
    "animals_kept": "Cattle",
    "estimated_produce_value_last_season": "100000",
    "estimated_produce_value_this_season": "100000",
    "data_captured_by": "1",
    "agent_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-farmer-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;status&quot;: &quot;success&quot;,
&quot;message&quot;: &quot;Farmer profile created successfully&quot;,
&quot;data&quot;: {
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;dob&quot;: &quot;1981-05-06&quot;,

}
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Bad request&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Forbidden&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Not found&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (405):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Method not allowed&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Validation error&quot;,
    &quot;errors&quot;: {}
}</code>
 </pre>
            <blockquote>
            <p>Example response (429):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Too many requests&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Server error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-farmer-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-farmer-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-farmer-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-farmer-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-farmer-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-farmer-register" data-method="POST"
      data-path="api/farmer/register"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-farmer-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-farmer-register"
                    onclick="tryItOut('POSTapi-farmer-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-farmer-register"
                    onclick="cancelTryOut('POSTapi-farmer-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-farmer-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/farmer/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-farmer-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-farmer-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-farmer-register"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-farmer-register"
               value="John"
               data-component="body">
    <br>
<p>The first name of the farmer. Example: <code>John</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-farmer-register"
               value="Doe"
               data-component="body">
    <br>
<p>The last name of the farmer. Example: <code>Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dob</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dob"                data-endpoint="POSTapi-farmer-register"
               value="1990-01-01"
               data-component="body">
    <br>
<p>The date of birth of the farmer. Example: <code>1990-01-01</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-farmer-register"
               value="est"
               data-component="body">
    <br>
<p>Farmer gender. Example Male/Female Example: <code>est</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>education_level</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="education_level"                data-endpoint="POSTapi-farmer-register"
               value="Primary"
               data-component="body">
    <br>
<p>The education level of the farmer. Example: <code>Primary</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-farmer-register"
               value="0789123456"
               data-component="body">
    <br>
<p>The phone number of the farmer. Example: <code>0789123456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_number"                data-endpoint="POSTapi-farmer-register"
               value="CM12345678"
               data-component="body">
    <br>
<p>The national ID number of the farmer. Example: <code>CM12345678</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>marital_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="marital_status"                data-endpoint="POSTapi-farmer-register"
               value="Married"
               data-component="body">
    <br>
<p>The marital status of the farmer. Example: <code>Married</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="district"                data-endpoint="POSTapi-farmer-register"
               value="Kampala"
               data-component="body">
    <br>
<p>The district of the farmer. Example: <code>Kampala</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="county"                data-endpoint="POSTapi-farmer-register"
               value="Makindye"
               data-component="body">
    <br>
<p>The county of the farmer. Example: <code>Makindye</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sub_county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sub_county"                data-endpoint="POSTapi-farmer-register"
               value="Kibuye"
               data-component="body">
    <br>
<p>The sub county of the farmer. Example: <code>Kibuye</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parish</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="parish"                data-endpoint="POSTapi-farmer-register"
               value="Kibuye"
               data-component="body">
    <br>
<p>The parish of the farmer. Example: <code>Kibuye</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>village</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="village"                data-endpoint="POSTapi-farmer-register"
               value="Kibuye"
               data-component="body">
    <br>
<p>The village of the farmer. Example: <code>Kibuye</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="fpo_id"                data-endpoint="POSTapi-farmer-register"
               value="0"
               data-component="body">
    <br>
<p>The FPO name of the farmer. Example: <code>0</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>farmer_cordinates</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="farmer_cordinates"                data-endpoint="POSTapi-farmer-register"
               value="0.0000,0.0000"
               data-component="body">
    <br>
<p>The farmer cordinates of the farmer. Example: <code>0.0000,0.0000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>next_of_kin</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="next_of_kin"                data-endpoint="POSTapi-farmer-register"
               value="Jane Doe"
               data-component="body">
    <br>
<p>The next of kin of the farmer. Example: <code>Jane Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>next_of_kin_contact</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="next_of_kin_contact"                data-endpoint="POSTapi-farmer-register"
               value="0789123456"
               data-component="body">
    <br>
<p>The next of kin contact of the farmer. Example: <code>0789123456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>next_of_kin_relationship</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="next_of_kin_relationship"                data-endpoint="POSTapi-farmer-register"
               value="Wife"
               data-component="body">
    <br>
<p>The next of kin relationship of the farmer. Example: <code>Wife</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>male_members_in_household</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="male_members_in_household"                data-endpoint="POSTapi-farmer-register"
               value="2"
               data-component="body">
    <br>
<p>Number of male members of the household. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>female_members_in_household</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="female_members_in_household"                data-endpoint="POSTapi-farmer-register"
               value="4"
               data-component="body">
    <br>
<p>Number of male members of the household. Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>members_above_18</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="members_above_18"                data-endpoint="POSTapi-farmer-register"
               value="4"
               data-component="body">
    <br>
<p>Number of members above 18 years of age. Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>children_below_5</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="children_below_5"                data-endpoint="POSTapi-farmer-register"
               value="2"
               data-component="body">
    <br>
<p>Number of children below 5 years of age. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>school_going_children</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="school_going_children"                data-endpoint="POSTapi-farmer-register"
               value="2"
               data-component="body">
    <br>
<p>Number of school going children. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>head_of_family</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="head_of_family"                data-endpoint="POSTapi-farmer-register"
               value="John Doe"
               data-component="body">
    <br>
<p>The head of family of the farmer. Example: <code>John Doe</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>how_much_do_you_earn_from_agricultural_activities</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="how_much_do_you_earn_from_agricultural_activities"                data-endpoint="POSTapi-farmer-register"
               value="100000"
               data-component="body">
    <br>
<p>How much do you earn from agricultural activities. Example: <code>100000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>how_much_do_you_earn_from_non_agricultural_activities</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="how_much_do_you_earn_from_non_agricultural_activities"                data-endpoint="POSTapi-farmer-register"
               value="100000"
               data-component="body">
    <br>
<p>How much do you earn from non agricultural activities. Example: <code>100000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>do_you_have_an_account_with_an_FI</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="do_you_have_an_account_with_an_FI"                data-endpoint="POSTapi-farmer-register"
               value="Yes"
               data-component="body">
    <br>
<p>Do you have an account with an FI. Example: <code>Yes</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>farm_size</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="farm_size"                data-endpoint="POSTapi-farmer-register"
               value="2"
               data-component="body">
    <br>
<p>The farm size of the farmer. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>farm_size_under_agriculture</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="farm_size_under_agriculture"                data-endpoint="POSTapi-farmer-register"
               value="2"
               data-component="body">
    <br>
<p>The farm size under agriculture of the farmer. Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>land_ownership</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="land_ownership"                data-endpoint="POSTapi-farmer-register"
               value="Owned"
               data-component="body">
    <br>
<p>The land ownership of the farmer. Example: <code>Owned</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>type_of_farming</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="type_of_farming"                data-endpoint="POSTapi-farmer-register"
               value="Crop"
               data-component="body">
    <br>
<p>The type of farming of the farmer. Example: <code>Crop</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>crops_grown</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="crops_grown"                data-endpoint="POSTapi-farmer-register"
               value="Maize"
               data-component="body">
    <br>
<p>The crops grown of the farmer. Example: <code>Maize</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>animals_kept</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="animals_kept"                data-endpoint="POSTapi-farmer-register"
               value="Cattle"
               data-component="body">
    <br>
<p>The animals kept of the farmer. Example: <code>Cattle</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estimated_produce_value_last_season</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="estimated_produce_value_last_season"                data-endpoint="POSTapi-farmer-register"
               value="100000"
               data-component="body">
    <br>
<p>The estimated produce value last season of the farmer. Example: <code>100000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>estimated_produce_value_this_season</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="estimated_produce_value_this_season"                data-endpoint="POSTapi-farmer-register"
               value="100000"
               data-component="body">
    <br>
<p>The estimated produce value this season of the farmer. Example: <code>100000</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>data_captured_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="data_captured_by"                data-endpoint="POSTapi-farmer-register"
               value="1"
               data-component="body">
    <br>
<p>The data captured by of the farmer. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>agent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="agent_id"                data-endpoint="POSTapi-farmer-register"
               value="1"
               data-component="body">
    <br>
<p>The agent id of the farmer. Example: <code>1</code></p>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>