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
                                                    <li class="tocify-item level-2" data-unique="agent-management-GETapi-agents-all">
                                <a href="#agent-management-GETapi-agents-all">Get all Agents</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-POSTapi-agent-search">
                                <a href="#agent-management-POSTapi-agent-search">Search Agent</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-POSTapi-agent-search-auth">
                                <a href="#agent-management-POSTapi-agent-search-auth">Search Agent with Basic Auth</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-GETapi-agents">
                                <a href="#agent-management-GETapi-agents">Get all agents</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-POSTapi-agent-register">
                                <a href="#agent-management-POSTapi-agent-register">Create a new agent</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-GETapi-agent--agent_code-">
                                <a href="#agent-management-GETapi-agent--agent_code-">Get Agent</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-POSTapi-agent--id--update">
                                <a href="#agent-management-POSTapi-agent--id--update">POST api/agent/{id}/update</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-GETapi-agent--agent_id--farmers">
                                <a href="#agent-management-GETapi-agent--agent_id--farmers">Get Agent Registered Farmers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-POSTapi-agent-device-add">
                                <a href="#agent-management-POSTapi-agent-device-add">Add device to agent</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-GETapi-agent--agent_id--farmers-count">
                                <a href="#agent-management-GETapi-agent--agent_id--farmers-count">Get agent farmers count</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-GETapi-agents-graph">
                                <a href="#agent-management-GETapi-agents-graph">Get agent graph Numbers</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-PUTapi-agent-status-update">
                                <a href="#agent-management-PUTapi-agent-status-update">Update agent status</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="agent-management-POSTapi-agent-farmers-status">
                                <a href="#agent-management-POSTapi-agent-farmers-status">Get agent farmers by status</a>
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
                                                                                <li class="tocify-item level-2" data-unique="data-management-GETapi-farmers-bio">
                                <a href="#data-management-GETapi-farmers-bio">Get all farmers with biometrics</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="data-management-GETapi-farmers-bio-failed">
                                <a href="#data-management-GETapi-farmers-bio-failed">Get all farmers with failed biometric captures</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="data-management-GETapi-farmers-bio-duplicates">
                                <a href="#data-management-GETapi-farmers-bio-duplicates">Get all farmers with duplicate biometric captures</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="data-management-GETapi-farmer--farmer_id-">
                                <a href="#data-management-GETapi-farmer--farmer_id-">Get farmer</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="data-management-POSTapi-search">
                                <a href="#data-management-POSTapi-search">Search Data</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="data-management-GETapi-farmer-date-summary">
                                <a href="#data-management-GETapi-farmer-date-summary">Get Farmer registration by date</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="data-management-GETapi-farmer-fpo-summary">
                                <a href="#data-management-GETapi-farmer-fpo-summary">Get Farmers by FPO</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="data-management-GETapi-districts">
                                <a href="#data-management-GETapi-districts">Get Districts</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-district">
                                <a href="#endpoints-GETapi-district">GET api/district</a>
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
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-GETapi-fpos-coordinates">
                                <a href="#fpo-management-GETapi-fpos-coordinates">Get FPO Coordinates</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-POSTapi-fpo--id--user-add">
                                <a href="#fpo-management-POSTapi-fpo--id--user-add">Create FPO user account.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-GETapi-fpo--id--users">
                                <a href="#fpo-management-GETapi-fpo--id--users">Fetch FPO user accounts.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="fpo-management-GETapi-user--user_id---status-">
                                <a href="#fpo-management-GETapi-user--user_id---status-">Change User Account Status</a>
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
                                                                                <li class="tocify-item level-2" data-unique="farmer-profile-PUTapi-farmer-update-status">
                                <a href="#farmer-profile-PUTapi-farmer-update-status">Update Farmer Profile Status</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="farmer-profile-GETapi-farmers-search--keyword-">
                                <a href="#farmer-profile-GETapi-farmers-search--keyword-">Farmer Search</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-reports" class="tocify-header">
                <li class="tocify-item level-1" data-unique="reports">
                    <a href="#reports">Reports</a>
                </li>
                                    <ul id="tocify-subheader-reports" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="reports-GETapi-reports">
                                <a href="#reports-GETapi-reports">Get all reports</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="reports-POSTapi-report-register">
                                <a href="#reports-POSTapi-report-register">Create a report</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="reports-DELETEapi-report--id-">
                                <a href="#reports-DELETEapi-report--id-">Delete a report</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-statistics" class="tocify-header">
                <li class="tocify-item level-1" data-unique="statistics">
                    <a href="#statistics">Statistics</a>
                </li>
                                    <ul id="tocify-subheader-statistics" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="statistics-GETapi-summary">
                                <a href="#statistics-GETapi-summary">Dashboard Summary</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="statistics-GETapi-summary-fpo">
                                <a href="#statistics-GETapi-summary-fpo">FPO Dashboard Summary</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="statistics-GETapi-bio-summary">
                                <a href="#statistics-GETapi-bio-summary">Biometic Summary</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-unffe-outreach" class="tocify-header">
                <li class="tocify-item level-1" data-unique="unffe-outreach">
                    <a href="#unffe-outreach">UNFFE Outreach</a>
                </li>
                                    <ul id="tocify-subheader-unffe-outreach" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="unffe-outreach-GETapi-unffe-outreach">
                                <a href="#unffe-outreach-GETapi-unffe-outreach">Get all UNFFE Outreach</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="unffe-outreach-POSTapi-unffe-outreach-register">
                                <a href="#unffe-outreach-POSTapi-unffe-outreach-register">Register UNFFE Outreach</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="unffe-outreach-POSTapi-unffe-outreach--id--update">
                                <a href="#unffe-outreach-POSTapi-unffe-outreach--id--update">Update UNFFE Outreach</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="unffe-outreach-DELETEapi-unffe-outreach--id-">
                                <a href="#unffe-outreach-DELETEapi-unffe-outreach--id-">Delete UNFFE Outreach</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-users-management" class="tocify-header">
                <li class="tocify-item level-1" data-unique="users-management">
                    <a href="#users-management">Users Management</a>
                </li>
                                    <ul id="tocify-subheader-users-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="users-management-GETapi-users">
                                <a href="#users-management-GETapi-users">Get all users</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-management-POSTapi-user-register">
                                <a href="#users-management-POSTapi-user-register">Create a new user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-management-GETapi-user--id-">
                                <a href="#users-management-GETapi-user--id-">Get User by id</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-management-POSTapi-user--id--update">
                                <a href="#users-management-POSTapi-user--id--update">Update user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-management-PUTapi-user-status-update">
                                <a href="#users-management-PUTapi-user-status-update">Update user status</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-management-GETapi-user--id--password-reset">
                                <a href="#users-management-GETapi-user--id--password-reset">Reset user password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-management-PUTapi-user-password-update">
                                <a href="#users-management-PUTapi-user-password-update">Update user password</a>
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
        <li>Last updated: August 16, 2023</li>
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

                                <h2 id="agent-management-GETapi-agents-all">Get all Agents</h2>

<p>
</p>

<p>This endpoint allows a user to get all agents</p>

<span id="example-requests-GETapi-agents-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/agents/all" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Basic {api_key}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agents/all"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Basic {api_key}",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-agents-all">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;status&quot;: &quot;success&quot;,
&quot;data&quot;: [
{
&quot;id&quot;: 1,
&quot;agent_code&quot;: &quot;AGT001&quot;,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;photo&quot;: &quot;http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
&quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
},
{
&quot;id&quot;: 2,
&quot;agent_code&quot;: &quot;AGT002&quot;,
&quot;first_name&quot;: &quot;Jane&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;photo&quot;: &quot;http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
&quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
}
]
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Invalid token&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;No agents found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-agents-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-agents-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agents-all"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-agents-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agents-all">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-agents-all" data-method="GET"
      data-path="api/agents/all"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-agents-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-agents-all"
                    onclick="tryItOut('GETapi-agents-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-agents-all"
                    onclick="cancelTryOut('GETapi-agents-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-agents-all"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/agents/all</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-agents-all"
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
                              name="Accept"                data-endpoint="GETapi-agents-all"
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
                              name="Authorization"                data-endpoint="GETapi-agents-all"
               value="required The authorization token. Example: Basic {api_key}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Basic {api_key}</code></p>
            </div>
                        </form>

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
    --header "Authorization: required The authorization token. Example: Basic {api_key}" \
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
    "Authorization": "required The authorization token. Example: Basic {api_key}",
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
&quot;agent_code&quot;: &quot;AGT001&quot;,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;photo&quot;: &quot;http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
&quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
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
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Invalid token&quot;
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
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization"                data-endpoint="POSTapi-agent-search"
               value="required The authorization token. Example: Basic {api_key}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Basic {api_key}</code></p>
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

                    <h2 id="agent-management-POSTapi-agent-search-auth">Search Agent with Basic Auth</h2>

<p>
</p>

<p>This endpoint allows a user to search for a specific agent by agent code</p>

<span id="example-requests-POSTapi-agent-search-auth">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/agent/search/auth" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Basic {api_key}" \
    --data "{
    \"agent_id\": \"AGT001\",
    \"first_name\": \"John\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/search/auth"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Basic {api_key}",
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

<span id="example-responses-POSTapi-agent-search-auth">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;status&quot;: &quot;success&quot;,
&quot;data&quot;: {
&quot;id&quot;: 1,
&quot;agent_code&quot;: &quot;AGT001&quot;,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;photo&quot;: &quot;http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
&quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
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
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Invalid token&quot;
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
    </span>
<span id="execution-results-POSTapi-agent-search-auth" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-agent-search-auth"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agent-search-auth"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-agent-search-auth" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agent-search-auth">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-agent-search-auth" data-method="POST"
      data-path="api/agent/search/auth"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-agent-search-auth', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-agent-search-auth"
                    onclick="tryItOut('POSTapi-agent-search-auth');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-agent-search-auth"
                    onclick="cancelTryOut('POSTapi-agent-search-auth');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-agent-search-auth"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/agent/search/auth</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-agent-search-auth"
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
                              name="Accept"                data-endpoint="POSTapi-agent-search-auth"
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
                              name="Authorization"                data-endpoint="POSTapi-agent-search-auth"
               value="required The authorization token. Example: Basic {api_key}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Basic {api_key}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>agent_id</code></b>&nbsp;&nbsp;
<small>required</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="agent_id"                data-endpoint="POSTapi-agent-search-auth"
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
                              name="first_name"                data-endpoint="POSTapi-agent-search-auth"
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
    \"phone_number\": \"256XXXXXXXXX\",
    \"age\": \"30\",
    \"gender\": \"aliquid\",
    \"residence\": \"Kampala\",
    \"referee_name\": \"Jane Doe\",
    \"referee_phone_number\": \"08012345678\",
    \"designation\": \"Agro Extension Worker\",
    \"created_by\": 2,
    \"fpo_id\": 16,
    \"email\": \"mary.larson@example.org\"
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
    "phone_number": "256XXXXXXXXX",
    "age": "30",
    "gender": "aliquid",
    "residence": "Kampala",
    "referee_name": "Jane Doe",
    "referee_phone_number": "08012345678",
    "designation": "Agro Extension Worker",
    "created_by": 2,
    "fpo_id": 16,
    "email": "mary.larson@example.org"
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
               value="aliquid"
               data-component="body">
    <br>
<p>Example: <code>aliquid</code></p>
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
               value="2"
               data-component="body">
    <br>
<p>Example: <code>2</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="fpo_id"                data-endpoint="POSTapi-agent-register"
               value="16"
               data-component="body">
    <br>
<p>Example: <code>16</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-agent-register"
               value="mary.larson@example.org"
               data-component="body">
    <br>
<p>The email of the agent. Example: Example: <code>mary.larson@example.org</code></p>
        </div>
        </form>

                    <h2 id="agent-management-GETapi-agent--agent_code-">Get Agent</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get a specific agent</p>

<span id="example-requests-GETapi-agent--agent_code-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/agent/officia" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/officia"
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

<span id="example-responses-GETapi-agent--agent_code-">
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
<span id="execution-results-GETapi-agent--agent_code-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-agent--agent_code-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agent--agent_code-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-agent--agent_code-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agent--agent_code-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-agent--agent_code-" data-method="GET"
      data-path="api/agent/{agent_code}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-agent--agent_code-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-agent--agent_code-"
                    onclick="tryItOut('GETapi-agent--agent_code-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-agent--agent_code-"
                    onclick="cancelTryOut('GETapi-agent--agent_code-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-agent--agent_code-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/agent/{agent_code}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-agent--agent_code-"
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
                              name="Accept"                data-endpoint="GETapi-agent--agent_code-"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-agent--agent_code-"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>agent_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="agent_code"                data-endpoint="GETapi-agent--agent_code-"
               value="officia"
               data-component="url">
    <br>
<p>Example: <code>officia</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>agent</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="agent"                data-endpoint="GETapi-agent--agent_code-"
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
    "https://farmers.nauticaltech.ug/api/agent/atque/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/atque/update"
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
               value="atque"
               data-component="url">
    <br>
<p>The ID of the agent. Example: <code>atque</code></p>
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

                    <h2 id="agent-management-POSTapi-agent-device-add">Add device to agent</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to add a device to an agent</p>

<span id="example-requests-POSTapi-agent-device-add">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/agent/device/add" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"agent_id\": 1,
    \"brand\": \"Samsung\",
    \"device_id\": 123456,
    \"assigned_phone_number\": \"asperiores\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/device/add"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "agent_id": 1,
    "brand": "Samsung",
    "device_id": 123456,
    "assigned_phone_number": "asperiores"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-agent-device-add">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;message&quot;: &quot;Device added to agent successfully&quot;,
&quot;data&quot;: {
&quot;id&quot;: 1,
&quot;agent_code&quot;: &quot;AGT001&quot;,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;photo&quot;: &quot;http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
&quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
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
&quot;agent_id&quot;: [
&quot;The agent id field is required.&quot;
],
&quot;brand&quot;: [
&quot;The brand field is required.&quot;
],
&quot;device_id&quot;: [
&quot;The device id field is required.&quot;
]
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
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Device not added to agent&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-agent-device-add" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-agent-device-add"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agent-device-add"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-agent-device-add" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agent-device-add">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-agent-device-add" data-method="POST"
      data-path="api/agent/device/add"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-agent-device-add', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-agent-device-add"
                    onclick="tryItOut('POSTapi-agent-device-add');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-agent-device-add"
                    onclick="cancelTryOut('POSTapi-agent-device-add');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-agent-device-add"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/agent/device/add</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-agent-device-add"
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
                              name="Accept"                data-endpoint="POSTapi-agent-device-add"
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
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-agent-device-add"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>agent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="agent_id"                data-endpoint="POSTapi-agent-device-add"
               value="1"
               data-component="body">
    <br>
<p>The id of the agent. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>brand</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="brand"                data-endpoint="POSTapi-agent-device-add"
               value="Samsung"
               data-component="body">
    <br>
<p>The brand of the device. Example: <code>Samsung</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>device_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="device_id"                data-endpoint="POSTapi-agent-device-add"
               value="123456"
               data-component="body">
    <br>
<p>The id of the device. Example: <code>123456</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>assigned_phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="assigned_phone_number"                data-endpoint="POSTapi-agent-device-add"
               value="asperiores"
               data-component="body">
    <br>
<p>Example: <code>asperiores</code></p>
        </div>
        </form>

                    <h2 id="agent-management-GETapi-agent--agent_id--farmers-count">Get agent farmers count</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get the farmers count of an agent</p>

<span id="example-requests-GETapi-agent--agent_id--farmers-count">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/agent/voluptatem/farmers/count" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"agent_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/voluptatem/farmers/count"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "agent_id": 1
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-agent--agent_id--farmers-count">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;status&quot;: &quot;success&quot;,
&quot;data&quot;: {
&quot;id&quot;: 1,
&quot;agent_code&quot;: &quot;AGT001&quot;,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;photo&quot;: &quot;http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
&quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
&quot;farmers_count&quot;: 1
}
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
    </span>
<span id="execution-results-GETapi-agent--agent_id--farmers-count" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-agent--agent_id--farmers-count"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agent--agent_id--farmers-count"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-agent--agent_id--farmers-count" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agent--agent_id--farmers-count">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-agent--agent_id--farmers-count" data-method="GET"
      data-path="api/agent/{agent_id}/farmers/count"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-agent--agent_id--farmers-count', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-agent--agent_id--farmers-count"
                    onclick="tryItOut('GETapi-agent--agent_id--farmers-count');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-agent--agent_id--farmers-count"
                    onclick="cancelTryOut('GETapi-agent--agent_id--farmers-count');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-agent--agent_id--farmers-count"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/agent/{agent_id}/farmers/count</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-agent--agent_id--farmers-count"
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
                              name="Accept"                data-endpoint="GETapi-agent--agent_id--farmers-count"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-agent--agent_id--farmers-count"
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
                              name="agent_id"                data-endpoint="GETapi-agent--agent_id--farmers-count"
               value="voluptatem"
               data-component="url">
    <br>
<p>The ID of the agent. Example: <code>voluptatem</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>agent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="agent_id"                data-endpoint="GETapi-agent--agent_id--farmers-count"
               value="1"
               data-component="body">
    <br>
<p>The id of the agent. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="agent-management-GETapi-agents-graph">Get agent graph Numbers</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get the farmers count of an agent</p>

<span id="example-requests-GETapi-agents-graph">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/agents/graph" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agents/graph"
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

<span id="example-responses-GETapi-agents-graph">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;agent_code&quot;: &quot;AGT001&quot;,
            &quot;name&quot;: &quot;John Doe&quot;,
            &quot;farmers_count&quot;: 1
        },
        {
            &quot;id&quot;: 2,
            &quot;agent_code&quot;: &quot;AGT002&quot;,
            &quot;name&quot;: &quot;John Doe&quot;,
            &quot;farmers_count&quot;: 1
        }
    ]
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
    </span>
<span id="execution-results-GETapi-agents-graph" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-agents-graph"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-agents-graph"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-agents-graph" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-agents-graph">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-agents-graph" data-method="GET"
      data-path="api/agents/graph"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-agents-graph', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-agents-graph"
                    onclick="tryItOut('GETapi-agents-graph');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-agents-graph"
                    onclick="cancelTryOut('GETapi-agents-graph');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-agents-graph"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/agents/graph</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-agents-graph"
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
                              name="Accept"                data-endpoint="GETapi-agents-graph"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-agents-graph"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="agent-management-PUTapi-agent-status-update">Update agent status</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to update the agent status</p>

<span id="example-requests-PUTapi-agent-status-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://farmers.nauticaltech.ug/api/agent/status/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"agent_id\": 1,
    \"status\": \"active\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/status/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "agent_id": 1,
    "status": "active"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-agent-status-update">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;Agent status updated successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;agent_code&quot;: &quot;AGT001&quot;,
        &quot;first_name&quot;: &quot;John&quot;,
        &quot;last_name&quot;: &quot;Doe&quot;,
        &quot;photo&quot;: &quot;http://url.test/storage/agents/1624810572IMG_20210627_174358.jpg&quot;,
        &quot;created_at&quot;: &quot;2021-06-27T17:09:32.000000Z&quot;,
        &quot;farmers_count&quot;: 1
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
<span id="execution-results-PUTapi-agent-status-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-agent-status-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-agent-status-update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-agent-status-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-agent-status-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-agent-status-update" data-method="PUT"
      data-path="api/agent/status/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-agent-status-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-agent-status-update"
                    onclick="tryItOut('PUTapi-agent-status-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-agent-status-update"
                    onclick="cancelTryOut('PUTapi-agent-status-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-agent-status-update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/agent/status/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-agent-status-update"
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
                              name="Accept"                data-endpoint="PUTapi-agent-status-update"
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
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-agent-status-update"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>agent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="agent_id"                data-endpoint="PUTapi-agent-status-update"
               value="1"
               data-component="body">
    <br>
<p>The id of the agent. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-agent-status-update"
               value="active"
               data-component="body">
    <br>
<p>The status of the agent. Example: <code>active</code></p>
        </div>
        </form>

                    <h2 id="agent-management-POSTapi-agent-farmers-status">Get agent farmers by status</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get the farmers count of an agent</p>

<span id="example-requests-POSTapi-agent-farmers-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/agent/farmers/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"agent_id\": 1,
    \"status\": \"pending,complete,valid,invalid,blacklisted,deceased\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/agent/farmers/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "agent_id": 1,
    "status": "pending,complete,valid,invalid,blacklisted,deceased"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-agent-farmers-status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;message&quot;: &quot;Farmers found successfully&quot;,
&quot;data&quot;: [
{
&quot;current_page&quot;: 1,
&quot;data&quot;: [
{
&quot;id&quot;: 1,
}
]

}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-agent-farmers-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-agent-farmers-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-agent-farmers-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-agent-farmers-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-agent-farmers-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-agent-farmers-status" data-method="POST"
      data-path="api/agent/farmers/status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-agent-farmers-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-agent-farmers-status"
                    onclick="tryItOut('POSTapi-agent-farmers-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-agent-farmers-status"
                    onclick="cancelTryOut('POSTapi-agent-farmers-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-agent-farmers-status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/agent/farmers/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-agent-farmers-status"
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
                              name="Accept"                data-endpoint="POSTapi-agent-farmers-status"
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
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-agent-farmers-status"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>agent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="agent_id"                data-endpoint="POSTapi-agent-farmers-status"
               value="1"
               data-component="body">
    <br>
<p>The id of the agent. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTapi-agent-farmers-status"
               value="pending,complete,valid,invalid,blacklisted,deceased"
               data-component="body">
    <br>
<p>The status of the agent. Example: <code>pending,complete,valid,invalid,blacklisted,deceased</code></p>
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
    \"email\": \"istehr@example.com\",
    \"password\": \"90(Y1l@&amp;4h\\\\pN]7nS?qn\"
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
    "email": "istehr@example.com",
    "password": "90(Y1l@&amp;4h\\pN]7nS?qn"
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
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;Your account is inactive. Please contact the administrator..&quot;,
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
               value="istehr@example.com"
               data-component="body">
    <br>
<p>The email address or phone number of the user Example: <code>istehr@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="90(Y1l@&4h\pN]7nS?qn"
               data-component="body">
    <br>
<p>The password of the user Example: <code>90(Y1l@&amp;4h\pN]7nS?qn</code></p>
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

                    <h2 id="data-management-GETapi-farmers-bio">Get all farmers with biometrics</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get all farmers with biometrics</p>

<span id="example-requests-GETapi-farmers-bio">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/farmers/bio" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmers/bio"
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

<span id="example-responses-GETapi-farmers-bio">
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
}




}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-farmers-bio" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farmers-bio"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farmers-bio"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farmers-bio" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farmers-bio">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farmers-bio" data-method="GET"
      data-path="api/farmers/bio"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farmers-bio', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farmers-bio"
                    onclick="tryItOut('GETapi-farmers-bio');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farmers-bio"
                    onclick="cancelTryOut('GETapi-farmers-bio');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farmers-bio"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farmers/bio</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farmers-bio"
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
                              name="Accept"                data-endpoint="GETapi-farmers-bio"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-farmers-bio"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="data-management-GETapi-farmers-bio-failed">Get all farmers with failed biometric captures</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get all farmers with failed biometric captures</p>

<span id="example-requests-GETapi-farmers-bio-failed">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/farmers/bio/failed" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmers/bio/failed"
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

<span id="example-responses-GETapi-farmers-bio-failed">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;current_page&quot;: 1,
&quot;data&quot;: [
{

}
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-farmers-bio-failed" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farmers-bio-failed"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farmers-bio-failed"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farmers-bio-failed" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farmers-bio-failed">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farmers-bio-failed" data-method="GET"
      data-path="api/farmers/bio/failed"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farmers-bio-failed', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farmers-bio-failed"
                    onclick="tryItOut('GETapi-farmers-bio-failed');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farmers-bio-failed"
                    onclick="cancelTryOut('GETapi-farmers-bio-failed');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farmers-bio-failed"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farmers/bio/failed</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farmers-bio-failed"
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
                              name="Accept"                data-endpoint="GETapi-farmers-bio-failed"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-farmers-bio-failed"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="data-management-GETapi-farmers-bio-duplicates">Get all farmers with duplicate biometric captures</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get all farmers with duplicate biometric captures</p>

<span id="example-requests-GETapi-farmers-bio-duplicates">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/farmers/bio/duplicates" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmers/bio/duplicates"
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

<span id="example-responses-GETapi-farmers-bio-duplicates">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;current_page&quot;: 1,
    &quot;data&quot;: [
        {}
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-farmers-bio-duplicates" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farmers-bio-duplicates"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farmers-bio-duplicates"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farmers-bio-duplicates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farmers-bio-duplicates">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farmers-bio-duplicates" data-method="GET"
      data-path="api/farmers/bio/duplicates"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farmers-bio-duplicates', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farmers-bio-duplicates"
                    onclick="tryItOut('GETapi-farmers-bio-duplicates');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farmers-bio-duplicates"
                    onclick="cancelTryOut('GETapi-farmers-bio-duplicates');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farmers-bio-duplicates"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farmers/bio/duplicates</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farmers-bio-duplicates"
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
                              name="Accept"                data-endpoint="GETapi-farmers-bio-duplicates"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-farmers-bio-duplicates"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="data-management-GETapi-farmer--farmer_id-">Get farmer</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to get a farmer</p>

<span id="example-requests-GETapi-farmer--farmer_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/farmer/FAR_0001" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmer/FAR_0001"
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

<span id="example-responses-GETapi-farmer--farmer_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;status&quot;: &quot;success&quot;,
&quot;message&quot;: &quot;Farmer profile &quot;,
&quot;data&quot;: {
&quot;id&quot;: 1,
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
...
}
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
<span id="execution-results-GETapi-farmer--farmer_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farmer--farmer_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farmer--farmer_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farmer--farmer_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farmer--farmer_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farmer--farmer_id-" data-method="GET"
      data-path="api/farmer/{farmer_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farmer--farmer_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farmer--farmer_id-"
                    onclick="tryItOut('GETapi-farmer--farmer_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farmer--farmer_id-"
                    onclick="cancelTryOut('GETapi-farmer--farmer_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farmer--farmer_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farmer/{farmer_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farmer--farmer_id-"
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
                              name="Accept"                data-endpoint="GETapi-farmer--farmer_id-"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-farmer--farmer_id-"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>farmer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="farmer_id"                data-endpoint="GETapi-farmer--farmer_id-"
               value="FAR_0001"
               data-component="url">
    <br>
<p>The Farmer unique ID . Example: <code>FAR_0001</code></p>
            </div>
                    </form>

                    <h2 id="data-management-POSTapi-search">Search Data</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows a user to search through FPOs, Agents and Farmers</p>

<span id="example-requests-POSTapi-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/search" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"search\": \"John\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/search"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "search": "John"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-search">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;fpos&quot;: [],
&quot;agents&quot;: [],
&quot;farmers&quot;: [],

}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-search" data-method="POST"
      data-path="api/search"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-search"
                    onclick="tryItOut('POSTapi-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-search"
                    onclick="cancelTryOut('POSTapi-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-search"
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
                              name="Accept"                data-endpoint="POSTapi-search"
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
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-search"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>search</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="search"                data-endpoint="POSTapi-search"
               value="John"
               data-component="body">
    <br>
<p>The FPO or Agent or Farmer name. Example: <code>John</code></p>
        </div>
        </form>

                    <h2 id="data-management-GETapi-farmer-date-summary">Get Farmer registration by date</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get Farmer registration by date</p>

<span id="example-requests-GETapi-farmer-date-summary">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/farmer/date/summary" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmer/date/summary"
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

<span id="example-responses-GETapi-farmer-date-summary">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;data&quot;:{
&quot;2022-06-01&quot;: 281,
&quot;2022-06-02&quot;: 281,
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-farmer-date-summary" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farmer-date-summary"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farmer-date-summary"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farmer-date-summary" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farmer-date-summary">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farmer-date-summary" data-method="GET"
      data-path="api/farmer/date/summary"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farmer-date-summary', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farmer-date-summary"
                    onclick="tryItOut('GETapi-farmer-date-summary');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farmer-date-summary"
                    onclick="cancelTryOut('GETapi-farmer-date-summary');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farmer-date-summary"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farmer/date/summary</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farmer-date-summary"
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
                              name="Accept"                data-endpoint="GETapi-farmer-date-summary"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-farmer-date-summary"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="data-management-GETapi-farmer-fpo-summary">Get Farmers by FPO</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get Farmers by FPO</p>

<span id="example-requests-GETapi-farmer-fpo-summary">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/farmer/fpo/summary" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmer/fpo/summary"
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

<span id="example-responses-GETapi-farmer-fpo-summary">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;data&quot;:{
&quot;FPO 1&quot;: 281,
&quot;FPO 2&quot;: 281,
}
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-farmer-fpo-summary" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farmer-fpo-summary"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farmer-fpo-summary"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farmer-fpo-summary" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farmer-fpo-summary">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farmer-fpo-summary" data-method="GET"
      data-path="api/farmer/fpo/summary"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farmer-fpo-summary', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farmer-fpo-summary"
                    onclick="tryItOut('GETapi-farmer-fpo-summary');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farmer-fpo-summary"
                    onclick="cancelTryOut('GETapi-farmer-fpo-summary');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farmer-fpo-summary"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farmer/fpo/summary</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farmer-fpo-summary"
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
                              name="Accept"                data-endpoint="GETapi-farmer-fpo-summary"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-farmer-fpo-summary"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="data-management-GETapi-districts">Get Districts</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get Distinct Districts and number of farmers registered</p>

<span id="example-requests-GETapi-districts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/districts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/districts"
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

<span id="example-responses-GETapi-districts">
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
<span id="execution-results-GETapi-districts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-districts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-districts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-districts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-districts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-districts" data-method="GET"
      data-path="api/districts"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-districts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-districts"
                    onclick="tryItOut('GETapi-districts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-districts"
                    onclick="cancelTryOut('GETapi-districts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-districts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/districts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-districts"
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
                              name="Accept"                data-endpoint="GETapi-districts"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-districts"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-district">GET api/district</h2>

<p>
</p>



<span id="example-requests-GETapi-district">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/district" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/district"
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

<span id="example-responses-GETapi-district">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: text/html; charset=UTF-8
cache-control: no-cache, private
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;"></code>
 </pre>
    </span>
<span id="execution-results-GETapi-district" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-district"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-district"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-district" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-district">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-district" data-method="GET"
      data-path="api/district"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-district', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-district"
                    onclick="tryItOut('GETapi-district');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-district"
                    onclick="cancelTryOut('GETapi-district');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-district"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/district</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-district"
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
                              name="Accept"                data-endpoint="GETapi-district"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
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
    \"fpo_name\": \"est\",
    \"district\": \"quas\",
    \"county\": \"qui\",
    \"sub_county\": \"fugiat\",
    \"parish\": \"et\",
    \"village\": \"omnis\",
    \"main_crop\": \"natus\",
    \"fpo_contact_name\": \"ullam\",
    \"contact_phone_number\": \"ducimus\",
    \"contact_email\": \"jacquelyn.wehner@example.com\",
    \"core_staff_count\": 3,
    \"core_staff_positions\": \"eos\",
    \"registration_status\": \"consequatur\",
    \"fpo_membership_number\": \"temporibus\",
    \"fpo_male_membership\": \"unde\",
    \"fpo_female_membership\": \"culpa\",
    \"fpo_male_youth\": \"excepturi\",
    \"fpo_female_youth\": \"magni\",
    \"fpo_field_agents\": \"dolores\",
    \"created_by\": 9
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
    "fpo_name": "est",
    "district": "quas",
    "county": "qui",
    "sub_county": "fugiat",
    "parish": "et",
    "village": "omnis",
    "main_crop": "natus",
    "fpo_contact_name": "ullam",
    "contact_phone_number": "ducimus",
    "contact_email": "jacquelyn.wehner@example.com",
    "core_staff_count": 3,
    "core_staff_positions": "eos",
    "registration_status": "consequatur",
    "fpo_membership_number": "temporibus",
    "fpo_male_membership": "unde",
    "fpo_female_membership": "culpa",
    "fpo_male_youth": "excepturi",
    "fpo_female_youth": "magni",
    "fpo_field_agents": "dolores",
    "created_by": 9
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
               value="est"
               data-component="body">
    <br>
<p>The name of the FPO. Example: <code>est</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="district"                data-endpoint="POSTapi-fpo-register"
               value="quas"
               data-component="body">
    <br>
<p>The district of the FPO. Example: <code>quas</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="county"                data-endpoint="POSTapi-fpo-register"
               value="qui"
               data-component="body">
    <br>
<p>The county of the FPO. Example: <code>qui</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sub_county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sub_county"                data-endpoint="POSTapi-fpo-register"
               value="fugiat"
               data-component="body">
    <br>
<p>The sub county of the FPO. Example: <code>fugiat</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parish</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="parish"                data-endpoint="POSTapi-fpo-register"
               value="et"
               data-component="body">
    <br>
<p>The parish of the FPO. Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>village</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="village"                data-endpoint="POSTapi-fpo-register"
               value="omnis"
               data-component="body">
    <br>
<p>The village of the FPO. Example: <code>omnis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>main_crop</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="main_crop"                data-endpoint="POSTapi-fpo-register"
               value="natus"
               data-component="body">
    <br>
<p>The main crop of the FPO. Example: <code>natus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_contact_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_contact_name"                data-endpoint="POSTapi-fpo-register"
               value="ullam"
               data-component="body">
    <br>
<p>The contact name of the FPO. Example: <code>ullam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact_phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact_phone_number"                data-endpoint="POSTapi-fpo-register"
               value="ducimus"
               data-component="body">
    <br>
<p>The contact phone number of the FPO. Example: <code>ducimus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact_email"                data-endpoint="POSTapi-fpo-register"
               value="jacquelyn.wehner@example.com"
               data-component="body">
    <br>
<p>The contact email of the FPO. Example: <code>jacquelyn.wehner@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>core_staff_count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="core_staff_count"                data-endpoint="POSTapi-fpo-register"
               value="3"
               data-component="body">
    <br>
<p>The number of core staff of the FPO. Example: <code>3</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>core_staff_positions</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="core_staff_positions"                data-endpoint="POSTapi-fpo-register"
               value="eos"
               data-component="body">
    <br>
<p>The positions of the core staff of the FPO. Example: <code>eos</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>registration_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="registration_status"                data-endpoint="POSTapi-fpo-register"
               value="consequatur"
               data-component="body">
    <br>
<p>The registration status of the FPO. Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_membership_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_membership_number"                data-endpoint="POSTapi-fpo-register"
               value="temporibus"
               data-component="body">
    <br>
<p>The membership number of the FPO. Example: <code>temporibus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_male_membership</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_male_membership"                data-endpoint="POSTapi-fpo-register"
               value="unde"
               data-component="body">
    <br>
<p>The male membership number of the FPO. Example: <code>unde</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_female_membership</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_female_membership"                data-endpoint="POSTapi-fpo-register"
               value="culpa"
               data-component="body">
    <br>
<p>The female membership number of the FPO. Example: <code>culpa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_male_youth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_male_youth"                data-endpoint="POSTapi-fpo-register"
               value="excepturi"
               data-component="body">
    <br>
<p>The male youth membership number of the FPO. Example: <code>excepturi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_female_youth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_female_youth"                data-endpoint="POSTapi-fpo-register"
               value="magni"
               data-component="body">
    <br>
<p>The female youth membership number of the FPO. Example: <code>magni</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_field_agents</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_field_agents"                data-endpoint="POSTapi-fpo-register"
               value="dolores"
               data-component="body">
    <br>
<p>The number of field agents of the FPO. Example: <code>dolores</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>created_by</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="created_by"                data-endpoint="POSTapi-fpo-register"
               value="9"
               data-component="body">
    <br>
<p>Example: <code>9</code></p>
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
    --get "https://farmers.nauticaltech.ug/api/fpo/magni" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/magni"
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
               value="magni"
               data-component="url">
    <br>
<p>The id of the FPO. Example: <code>magni</code></p>
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
    "https://farmers.nauticaltech.ug/api/fpo/cum/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"fpo_name\": \"magni\",
    \"district\": \"culpa\",
    \"county\": \"et\",
    \"sub_county\": \"repudiandae\",
    \"parish\": \"cumque\",
    \"village\": \"ea\",
    \"main_crop\": \"sequi\",
    \"fpo_contact_name\": \"quo\",
    \"contact_phone_number\": \"quae\",
    \"contact_email\": \"isadore37@example.com\",
    \"core_staff_count\": 5,
    \"core_staff_positions\": \"perferendis\",
    \"registration_status\": \"cupiditate\",
    \"fpo_membership_number\": \"autem\",
    \"fpo_male_membership\": \"tempore\",
    \"fpo_female_membership\": \"et\",
    \"fpo_male_youth\": \"neque\",
    \"fpo_female_youth\": \"esse\",
    \"fpo_field_agents\": \"blanditiis\",
    \"created_by\": 13
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/cum/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "fpo_name": "magni",
    "district": "culpa",
    "county": "et",
    "sub_county": "repudiandae",
    "parish": "cumque",
    "village": "ea",
    "main_crop": "sequi",
    "fpo_contact_name": "quo",
    "contact_phone_number": "quae",
    "contact_email": "isadore37@example.com",
    "core_staff_count": 5,
    "core_staff_positions": "perferendis",
    "registration_status": "cupiditate",
    "fpo_membership_number": "autem",
    "fpo_male_membership": "tempore",
    "fpo_female_membership": "et",
    "fpo_male_youth": "neque",
    "fpo_female_youth": "esse",
    "fpo_field_agents": "blanditiis",
    "created_by": 13
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
               value="cum"
               data-component="url">
    <br>
<p>The id of the FPO. Example: <code>cum</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_name"                data-endpoint="POSTapi-fpo--id--update"
               value="magni"
               data-component="body">
    <br>
<p>The name of the FPO. Example: <code>magni</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="district"                data-endpoint="POSTapi-fpo--id--update"
               value="culpa"
               data-component="body">
    <br>
<p>The district of the FPO. Example: <code>culpa</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="county"                data-endpoint="POSTapi-fpo--id--update"
               value="et"
               data-component="body">
    <br>
<p>The county of the FPO. Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sub_county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sub_county"                data-endpoint="POSTapi-fpo--id--update"
               value="repudiandae"
               data-component="body">
    <br>
<p>The sub county of the FPO. Example: <code>repudiandae</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parish</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="parish"                data-endpoint="POSTapi-fpo--id--update"
               value="cumque"
               data-component="body">
    <br>
<p>The parish of the FPO. Example: <code>cumque</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>village</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="village"                data-endpoint="POSTapi-fpo--id--update"
               value="ea"
               data-component="body">
    <br>
<p>The village of the FPO. Example: <code>ea</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>main_crop</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="main_crop"                data-endpoint="POSTapi-fpo--id--update"
               value="sequi"
               data-component="body">
    <br>
<p>The main crop of the FPO. Example: <code>sequi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_contact_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_contact_name"                data-endpoint="POSTapi-fpo--id--update"
               value="quo"
               data-component="body">
    <br>
<p>The contact name of the FPO. Example: <code>quo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact_phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact_phone_number"                data-endpoint="POSTapi-fpo--id--update"
               value="quae"
               data-component="body">
    <br>
<p>The contact phone number of the FPO. Example: <code>quae</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>contact_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="contact_email"                data-endpoint="POSTapi-fpo--id--update"
               value="isadore37@example.com"
               data-component="body">
    <br>
<p>The contact email of the FPO. Example: <code>isadore37@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>core_staff_count</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="core_staff_count"                data-endpoint="POSTapi-fpo--id--update"
               value="5"
               data-component="body">
    <br>
<p>The number of core staff of the FPO. Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>core_staff_positions</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="core_staff_positions"                data-endpoint="POSTapi-fpo--id--update"
               value="perferendis"
               data-component="body">
    <br>
<p>The positions of the core staff of the FPO. Example: <code>perferendis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>registration_status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="registration_status"                data-endpoint="POSTapi-fpo--id--update"
               value="cupiditate"
               data-component="body">
    <br>
<p>The registration status of the FPO. Example: <code>cupiditate</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_membership_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_membership_number"                data-endpoint="POSTapi-fpo--id--update"
               value="autem"
               data-component="body">
    <br>
<p>The membership number of the FPO. Example: <code>autem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_male_membership</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_male_membership"                data-endpoint="POSTapi-fpo--id--update"
               value="tempore"
               data-component="body">
    <br>
<p>The male membership number of the FPO. Example: <code>tempore</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_female_membership</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_female_membership"                data-endpoint="POSTapi-fpo--id--update"
               value="et"
               data-component="body">
    <br>
<p>The female membership number of the FPO. Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_male_youth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_male_youth"                data-endpoint="POSTapi-fpo--id--update"
               value="neque"
               data-component="body">
    <br>
<p>The male youth membership number of the FPO. Example: <code>neque</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_female_youth</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_female_youth"                data-endpoint="POSTapi-fpo--id--update"
               value="esse"
               data-component="body">
    <br>
<p>The female youth membership number of the FPO. Example: <code>esse</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_field_agents</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_field_agents"                data-endpoint="POSTapi-fpo--id--update"
               value="blanditiis"
               data-component="body">
    <br>
<p>The number of field agents of the FPO. Example: <code>blanditiis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>created_by</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="created_by"                data-endpoint="POSTapi-fpo--id--update"
               value="13"
               data-component="body">
    <br>
<p>Example: <code>13</code></p>
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
    --get "https://farmers.nauticaltech.ug/api/fpo/minus/agents" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/minus/agents"
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
               value="minus"
               data-component="url">
    <br>
<p>The id of the FPO. Example: <code>minus</code></p>
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
    --get "https://farmers.nauticaltech.ug/api/fpo/qui/farmers" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/qui/farmers"
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
               value="qui"
               data-component="url">
    <br>
<p>The id of the FPO. Example: <code>qui</code></p>
            </div>
                    </form>

                    <h2 id="fpo-management-GETapi-fpos-coordinates">Get FPO Coordinates</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to fetch the coordinates of all FPOs.</p>

<span id="example-requests-GETapi-fpos-coordinates">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/fpos/coordinates" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpos/coordinates"
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

<span id="example-responses-GETapi-fpos-coordinates">
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
<span id="execution-results-GETapi-fpos-coordinates" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-fpos-coordinates"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-fpos-coordinates"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-fpos-coordinates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-fpos-coordinates">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-fpos-coordinates" data-method="GET"
      data-path="api/fpos/coordinates"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-fpos-coordinates', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-fpos-coordinates"
                    onclick="tryItOut('GETapi-fpos-coordinates');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-fpos-coordinates"
                    onclick="cancelTryOut('GETapi-fpos-coordinates');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-fpos-coordinates"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/fpos/coordinates</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-fpos-coordinates"
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
                              name="Accept"                data-endpoint="GETapi-fpos-coordinates"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-fpos-coordinates"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="fpo-management-POSTapi-fpo--id--user-add">Create FPO user account.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to create a user account for a FPO.</p>

<span id="example-requests-POSTapi-fpo--id--user-add">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/fpo/architecto/user/add" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"fpo_id\": 11,
    \"name\": \"dicta\",
    \"phone_number\": \"laboriosam\",
    \"email\": \"alberto01@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/architecto/user/add"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "fpo_id": 11,
    "name": "dicta",
    "phone_number": "laboriosam",
    "email": "alberto01@example.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-fpo--id--user-add">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;message&quot;: &quot;User created successfully&quot;,
&quot;data&quot;: {
&quot;name&quot;: &quot;FPO 1&quot;,
&quot;phone_number&quot;: &quot;256700000000&quot;,
&quot;email&quot;: &quot;email@email.com&quot;,
&quot;user_type&quot;: &quot;fpo_user&quot;,
&quot;photo&quot;: &quot;https://ui-avatars.com/api/?name=FPO+1&amp;size=128&amp;background=007bff&amp;color=fff&quot;,
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
&quot;fpo_id&quot;: [
&quot;The fpo id field is required.&quot;
],
&quot;name&quot;: [
&quot;The name field is required.&quot;
],
&quot;phone_number&quot;: [
&quot;The phone number field is required.&quot;
],
&quot;email&quot;: [
&quot;The email field is required.&quot;
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
<span id="execution-results-POSTapi-fpo--id--user-add" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-fpo--id--user-add"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-fpo--id--user-add"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-fpo--id--user-add" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-fpo--id--user-add">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-fpo--id--user-add" data-method="POST"
      data-path="api/fpo/{id}/user/add"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-fpo--id--user-add', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-fpo--id--user-add"
                    onclick="tryItOut('POSTapi-fpo--id--user-add');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-fpo--id--user-add"
                    onclick="cancelTryOut('POSTapi-fpo--id--user-add');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-fpo--id--user-add"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/fpo/{id}/user/add</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-fpo--id--user-add"
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
                              name="Accept"                data-endpoint="POSTapi-fpo--id--user-add"
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
                              name="id"                data-endpoint="POSTapi-fpo--id--user-add"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the fpo. Example: <code>architecto</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="fpo_id"                data-endpoint="POSTapi-fpo--id--user-add"
               value="11"
               data-component="body">
    <br>
<p>The id of the FPO. Example: <code>11</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-fpo--id--user-add"
               value="dicta"
               data-component="body">
    <br>
<p>The name of the user. Example: <code>dicta</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-fpo--id--user-add"
               value="laboriosam"
               data-component="body">
    <br>
<p>The phone number of the user. Example: <code>laboriosam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-fpo--id--user-add"
               value="alberto01@example.com"
               data-component="body">
    <br>
<p>The email of the user. Example: <code>alberto01@example.com</code></p>
        </div>
        </form>

                    <h2 id="fpo-management-GETapi-fpo--id--users">Fetch FPO user accounts.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to fetch all user accounts of a FPO.</p>

<span id="example-requests-GETapi-fpo--id--users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/fpo/4/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/fpo/4/users"
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

<span id="example-responses-GETapi-fpo--id--users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;FPO users retrieved successfully&quot;,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;FPO 1&quot;,
            &quot;phone_number&quot;: &quot;256700000000&quot;,
            &quot;email&quot;: &quot;email@email.com&quot;,
            &quot;user_type&quot;: &quot;fpo_user&quot;,
            &quot;entity_id&quot;: &quot;1&quot;,
            &quot;photo&quot;: &quot;https://ui-avatars.com/api/?name=FPO+1&amp;size=128&amp;background=007bff&amp;color=fff&quot;,
            &quot;created_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;FPO 2&quot;,
            &quot;phone_number&quot;: &quot;256700000000&quot;,
            &quot;user_type&quot;: &quot;fpo_user&quot;,
            &quot;entity_id&quot;: &quot;2&quot;,
            &quot;photo&quot;: &quot;https://ui-avatars.com/api/?name=FPO+2&amp;size=128&amp;background=007bff&amp;color=fff&quot;,
            &quot;created_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-06-30T11:30:00.000000Z&quot;
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
    &quot;message&quot;: &quot;No FPO users found&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-fpo--id--users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-fpo--id--users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-fpo--id--users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-fpo--id--users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-fpo--id--users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-fpo--id--users" data-method="GET"
      data-path="api/fpo/{id}/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-fpo--id--users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-fpo--id--users"
                    onclick="tryItOut('GETapi-fpo--id--users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-fpo--id--users"
                    onclick="cancelTryOut('GETapi-fpo--id--users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-fpo--id--users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/fpo/{id}/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-fpo--id--users"
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
                              name="Accept"                data-endpoint="GETapi-fpo--id--users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-fpo--id--users"
               value="4"
               data-component="url">
    <br>
<p>The id of the FPO. Example: <code>4</code></p>
            </div>
                    </form>

                    <h2 id="fpo-management-GETapi-user--user_id---status-">Change User Account Status</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint allows you to change the status of a user account.</p>

<span id="example-requests-GETapi-user--user_id---status-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/user/8/active, inactive" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/user/8/active, inactive"
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

<span id="example-responses-GETapi-user--user_id---status-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user--user_id---status-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user--user_id---status-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user--user_id---status-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user--user_id---status-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user--user_id---status-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user--user_id---status-" data-method="GET"
      data-path="api/user/{user_id}/{status}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user--user_id---status-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user--user_id---status-"
                    onclick="tryItOut('GETapi-user--user_id---status-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user--user_id---status-"
                    onclick="cancelTryOut('GETapi-user--user_id---status-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user--user_id---status-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/{user_id}/{status}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user--user_id---status-"
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
                              name="Accept"                data-endpoint="GETapi-user--user_id---status-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>user_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="user_id"                data-endpoint="GETapi-user--user_id---status-"
               value="8"
               data-component="url">
    <br>
<p>The id of the user. Example: <code>8</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="GETapi-user--user_id---status-"
               value="active, inactive"
               data-component="url">
    <br>
<p>The status of the user. Example: <code>active, inactive</code></p>
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
    \"gender\": \"commodi\",
    \"education_level\": \"Primary\",
    \"marital_status\": \"Married\",
    \"district\": \"Kampala\",
    \"county\": \"Makindye\",
    \"sub_county\": \"Kibuye\",
    \"parish\": \"Kibuye\",
    \"village\": \"Kibuye\",
    \"fpo_id\": 0,
    \"farmer_cordinates\": \"0.0000,0.0000\",
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
    \"estimated_produce_value_last_season\": \"100000\",
    \"estimated_produce_value_this_season\": \"100000\",
    \"agent_id\": 1,
    \"phone_number\": \"0789123456\",
    \"id_number\": \"CM12345678\",
    \"next_of_kin\": \"Jane Doe\",
    \"next_of_kin_contact\": \"0789123456\",
    \"next_of_kin_relationship\": \"Wife\",
    \"animals_kept\": \"Cattle\",
    \"data_captured_by\": \"1\"
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
    "gender": "commodi",
    "education_level": "Primary",
    "marital_status": "Married",
    "district": "Kampala",
    "county": "Makindye",
    "sub_county": "Kibuye",
    "parish": "Kibuye",
    "village": "Kibuye",
    "fpo_id": 0,
    "farmer_cordinates": "0.0000,0.0000",
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
    "estimated_produce_value_last_season": "100000",
    "estimated_produce_value_this_season": "100000",
    "agent_id": 1,
    "phone_number": "0789123456",
    "id_number": "CM12345678",
    "next_of_kin": "Jane Doe",
    "next_of_kin_contact": "0789123456",
    "next_of_kin_relationship": "Wife",
    "animals_kept": "Cattle",
    "data_captured_by": "1"
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
               value="commodi"
               data-component="body">
    <br>
<p>Farmer gender. Example Male/Female Example: <code>commodi</code></p>
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
        </form>

                    <h2 id="farmer-profile-PUTapi-farmer-update-status">Update Farmer Profile Status</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update farmer profile status</p>

<span id="example-requests-PUTapi-farmer-update-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://farmers.nauticaltech.ug/api/farmer/update/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id\": 18,
    \"status\": \"pending,complete,valid,invalid,blacklisted,deceased\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmer/update/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 18,
    "status": "pending,complete,valid,invalid,blacklisted,deceased"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-farmer-update-status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;Farmer profile status updated successfully&quot;,
    &quot;data&quot;: {
        &quot;farmer_id&quot;: 1,
        &quot;first_name&quot;: &quot;John&quot;,
        &quot;last_name&quot;: &quot;Doe&quot;,
        &quot;dob&quot;: &quot;1981-05-06&quot;,
        &quot;gender&quot;: &quot;Male&quot;,
        &quot;education_level&quot;: &quot;High School&quot;,
        &quot;phone_number&quot;: &quot;1234567890&quot;,
        &quot;id_number&quot;: &quot;1234567890&quot;,
        &quot;marital_status&quot;: &quot;Single&quot;,
        &quot;district&quot;: &quot;1&quot;,
        &quot;county&quot;: &quot;1&quot;,
        &quot;sub_county&quot;: &quot;1&quot;,
        &quot;parish&quot;: &quot;1&quot;,
        &quot;village&quot;: &quot;1&quot;,
        &quot;fpo_id&quot;: &quot;1&quot;,
        &quot;farmer_cordinates&quot;: &quot;1&quot;,
        &quot;next_of_kin&quot;: &quot;1&quot;,
        &quot;next_of_kin_contact&quot;: &quot;1&quot;,
        &quot;next_of_kin_relationship&quot;: &quot;1&quot;,
        &quot;male_members_in_household&quot;: &quot;1&quot;,
        &quot;female_members_in_household&quot;: &quot;1&quot;,
        &quot;members_above_18&quot;: &quot;1&quot;,
        &quot;children_below_5&quot;: &quot;1&quot;,
        &quot;school_going_children&quot;: &quot;1&quot;,
        &quot;head_of_family&quot;: &quot;1&quot;,
        &quot;how_much_do_you_earn_from_agricultural_activities&quot;: &quot;1&quot;,
        &quot;how_much_do_you_earn_from_non_agricultural_activities&quot;: &quot;1&quot;,
        &quot;do_you_have_an_account_with_an_FI&quot;: &quot;1&quot;,
        &quot;farm_size&quot;: &quot;1&quot;,
        &quot;farm_size_under_agriculture&quot;: &quot;1&quot;,
        &quot;land_ownership&quot;: &quot;1&quot;,
        &quot;type_of_farming&quot;: &quot;1&quot;,
        &quot;crops_grown&quot;: &quot;1&quot;,
        &quot;animals_kept&quot;: &quot;1&quot;,
        &quot;estimated_produce_value_last_season&quot;: &quot;1&quot;,
        &quot;estimated_produce_value_this_season&quot;: &quot;1&quot;,
        &quot;data_captured_by&quot;: &quot;1&quot;,
        &quot;agent_id&quot;: &quot;1&quot;,
        &quot;photo&quot;: &quot;farmer.jpg&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Farmer profile not found&quot;,
    &quot;errors&quot;: {
        &quot;farmer_id&quot;: [
            &quot;Farmer profile not found&quot;
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: &quot;Validation error&quot;,
    &quot;errors&quot;: {
        &quot;farmer_id&quot;: [
            &quot;Farmer id is required&quot;
        ],
        &quot;status&quot;: [
            &quot;Status is required&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-farmer-update-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-farmer-update-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-farmer-update-status"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-farmer-update-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-farmer-update-status">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-farmer-update-status" data-method="PUT"
      data-path="api/farmer/update/status"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-farmer-update-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-farmer-update-status"
                    onclick="tryItOut('PUTapi-farmer-update-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-farmer-update-status"
                    onclick="cancelTryOut('PUTapi-farmer-update-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-farmer-update-status"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/farmer/update/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-farmer-update-status"
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
                              name="Accept"                data-endpoint="PUTapi-farmer-update-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-farmer-update-status"
               value="18"
               data-component="body">
    <br>
<p>Farmer id Example: <code>18</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-farmer-update-status"
               value="pending,complete,valid,invalid,blacklisted,deceased"
               data-component="body">
    <br>
<p>Farmer profile status Example: <code>pending,complete,valid,invalid,blacklisted,deceased</code></p>
        </div>
        </form>

                    <h2 id="farmer-profile-GETapi-farmers-search--keyword-">Farmer Search</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Search all farmers</p>

<span id="example-requests-GETapi-farmers-search--keyword-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/farmers/search/error" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/farmers/search/error"
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

<span id="example-responses-GETapi-farmers-search--keyword-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-farmers-search--keyword-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-farmers-search--keyword-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-farmers-search--keyword-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-farmers-search--keyword-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-farmers-search--keyword-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-farmers-search--keyword-" data-method="GET"
      data-path="api/farmers/search/{keyword}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-farmers-search--keyword-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-farmers-search--keyword-"
                    onclick="tryItOut('GETapi-farmers-search--keyword-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-farmers-search--keyword-"
                    onclick="cancelTryOut('GETapi-farmers-search--keyword-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-farmers-search--keyword-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/farmers/search/{keyword}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-farmers-search--keyword-"
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
                              name="Accept"                data-endpoint="GETapi-farmers-search--keyword-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>keyword</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="keyword"                data-endpoint="GETapi-farmers-search--keyword-"
               value="error"
               data-component="url">
    <br>
<p>Example: <code>error</code></p>
            </div>
                    </form>

                <h1 id="reports">Reports</h1>

    <p>APIs for generating and managing reports</p>

                                <h2 id="reports-GETapi-reports">Get all reports</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get a list of generated reports</p>

<span id="example-requests-GETapi-reports">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/reports" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/reports"
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

<span id="example-responses-GETapi-reports">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;reports&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Report 1&quot;,
                &quot;report_type&quot;: &quot;2022-01-01&quot;,
                &quot;report_params&quot;: {
                    &quot;from_date&quot;: &quot;2022-01-01&quot;,
                    &quot;to_date&quot;: &quot;2022-01-01&quot;,
                    &quot;district&quot;: &quot;Kampala&quot;,
                    &quot;agent_id&quot;: 1,
                    &quot;product&quot;: &quot;Maize&quot;,
                    &quot;farm_size&quot;: &quot;1&quot;,
                    &quot;gender&quot;: &quot;Male&quot;
                },
                &quot;created_by&quot;: 1,
                &quot;status&quot;: &quot;completed&quot;,
                &quot;report_url&quot;: &quot;http://127.0.0.1:8000/report/1.xls&quot;
            }
        ]
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;The given data was invalid.&quot;
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;Unauthenticated.&quot;
    ]
}
]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-reports" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-reports"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reports"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-reports" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reports">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-reports" data-method="GET"
      data-path="api/reports"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-reports', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-reports"
                    onclick="tryItOut('GETapi-reports');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-reports"
                    onclick="cancelTryOut('GETapi-reports');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-reports"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/reports</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-reports"
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
                              name="Accept"                data-endpoint="GETapi-reports"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-reports"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="reports-POSTapi-report-register">Create a report</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Create a report</p>

<span id="example-requests-POSTapi-report-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/report/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"name\": \"veniam\",
    \"report_type\": \"farmer-report, crop-report,agent-summary-report,biometics-report\",
    \"from_date\": \"consectetur\",
    \"to_date\": \"voluptas\",
    \"district\": \"nisi\",
    \"agent_id\": 5,
    \"crops_grown\": \"Maize, Wheat, beans\",
    \"farm_size\": 4,
    \"gender\": \"Male, Female\",
    \"fpo_id\": 8
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/report/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "name": "veniam",
    "report_type": "farmer-report, crop-report,agent-summary-report,biometics-report",
    "from_date": "consectetur",
    "to_date": "voluptas",
    "district": "nisi",
    "agent_id": 5,
    "crops_grown": "Maize, Wheat, beans",
    "farm_size": 4,
    "gender": "Male, Female",
    "fpo_id": 8
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-report-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;Report created successfully&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Report 1&quot;,
        &quot;report_type&quot;: &quot;2022-01-01&quot;,
        &quot;report_params&quot;: {
            &quot;from_date&quot;: &quot;2022-01-01&quot;,
            &quot;to_date&quot;: &quot;2022-01-01&quot;,
            &quot;district&quot;: &quot;Kampala&quot;,
            &quot;agent_id&quot;: 1,
            &quot;product&quot;: &quot;Maize&quot;,
            &quot;farm_size&quot;: &quot;1&quot;,
            &quot;gender&quot;: &quot;Male&quot;
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;The given data was invalid.&quot;
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;Unauthenticated.&quot;
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-report-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-report-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-report-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-report-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-report-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-report-register" data-method="POST"
      data-path="api/report/register"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-report-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-report-register"
                    onclick="tryItOut('POSTapi-report-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-report-register"
                    onclick="cancelTryOut('POSTapi-report-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-report-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/report/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-report-register"
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
                              name="Accept"                data-endpoint="POSTapi-report-register"
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
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-report-register"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-report-register"
               value="veniam"
               data-component="body">
    <br>
<p>The name of the report Example: <code>veniam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>report_type</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="report_type"                data-endpoint="POSTapi-report-register"
               value="farmer-report, crop-report,agent-summary-report,biometics-report"
               data-component="body">
    <br>
<p>The report type of the report Example: <code>farmer-report, crop-report,agent-summary-report,biometics-report</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>from_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="from_date"                data-endpoint="POSTapi-report-register"
               value="consectetur"
               data-component="body">
    <br>
<p>The from date for the report Example: <code>consectetur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>to_date</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="to_date"                data-endpoint="POSTapi-report-register"
               value="voluptas"
               data-component="body">
    <br>
<p>The to date for the report Example: <code>voluptas</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="district"                data-endpoint="POSTapi-report-register"
               value="nisi"
               data-component="body">
    <br>
<p>optional The district of the report Example: <code>nisi</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>agent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="agent_id"                data-endpoint="POSTapi-report-register"
               value="5"
               data-component="body">
    <br>
<p>optional The agent id of the report Example: <code>5</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>crops_grown</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="crops_grown"                data-endpoint="POSTapi-report-register"
               value="Maize, Wheat, beans"
               data-component="body">
    <br>
<p>optional The product of the report Example: <code>Maize, Wheat, beans</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>farm_size</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="farm_size"                data-endpoint="POSTapi-report-register"
               value="4"
               data-component="body">
    <br>
<p>optional The farm size of the report Example: <code>4</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-report-register"
               value="Male, Female"
               data-component="body">
    <br>
<p>optional The gender of the report Example: <code>Male, Female</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="fpo_id"                data-endpoint="POSTapi-report-register"
               value="8"
               data-component="body">
    <br>
<p>optional The fpo id of the report Example: <code>8</code></p>
        </div>
        </form>

                    <h2 id="reports-DELETEapi-report--id-">Delete a report</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Delete a report</p>

<span id="example-requests-DELETEapi-report--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://farmers.nauticaltech.ug/api/report/dicta" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/report/dicta"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-report--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;message&quot;: &quot;Report deleted successfully&quot;,
    &quot;data&quot;: null
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-report--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-report--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-report--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-report--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-report--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-report--id-" data-method="DELETE"
      data-path="api/report/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-report--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-report--id-"
                    onclick="tryItOut('DELETEapi-report--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-report--id-"
                    onclick="cancelTryOut('DELETEapi-report--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-report--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/report/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-report--id-"
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
                              name="Accept"                data-endpoint="DELETEapi-report--id-"
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
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-report--id-"
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
                              name="id"                data-endpoint="DELETEapi-report--id-"
               value="dicta"
               data-component="url">
    <br>
<p>The ID of the report. Example: <code>dicta</code></p>
            </div>
                    </form>

                <h1 id="statistics">Statistics</h1>

    <p>APIs for managing the system statistics</p>

                                <h2 id="statistics-GETapi-summary">Dashboard Summary</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint returns the summary of the system statistics</p>

<span id="example-requests-GETapi-summary">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/summary" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/summary"
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

<span id="example-responses-GETapi-summary">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;system_stats&quot;: {
        &quot;total_farmers&quot;: 1,
        &quot;male_farmers&quot;: 0,
        &quot;female_farmers&quot;: 1,
        &quot;total_fpos&quot;: 1,
        &quot;total_agents&quot;: 10,
        &quot;male_agents&quot;: 4,
        &quot;female_agents&quot;: 6
    },
    &quot;fpo_stats&quot;: {
        &quot;total_registered_fpos&quot;: 1,
        &quot;total_unregistered_fpos&quot;: 0,
        &quot;total_fpos_membership&quot;: 100,
        &quot;total_male_membership&quot;: 50,
        &quot;total_female_membership&quot;: 50,
        &quot;total_male_youth_membership&quot;: 23,
        &quot;total_female_youth_membership&quot;: 27
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-summary" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-summary"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-summary"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-summary" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-summary">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-summary" data-method="GET"
      data-path="api/summary"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-summary', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-summary"
                    onclick="tryItOut('GETapi-summary');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-summary"
                    onclick="cancelTryOut('GETapi-summary');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-summary"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/summary</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-summary"
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
                              name="Accept"                data-endpoint="GETapi-summary"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-summary"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="statistics-GETapi-summary-fpo">FPO Dashboard Summary</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint returns the summary of the system statistics</p>

<span id="example-requests-GETapi-summary-fpo">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/summary/fpo" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/summary/fpo"
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

<span id="example-responses-GETapi-summary-fpo">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;data&quot;: {
&quot;registered_farmers&quot;: 1,
&quot;male_farmers&quot;: 0,
&quot;female_farmers&quot;: 1,
&quot;fpo_agents&quot;: 1,
&quot;male_agents&quot;: 0,
&quot;female_agents&quot;: 1
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-summary-fpo" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-summary-fpo"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-summary-fpo"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-summary-fpo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-summary-fpo">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-summary-fpo" data-method="GET"
      data-path="api/summary/fpo"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-summary-fpo', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-summary-fpo"
                    onclick="tryItOut('GETapi-summary-fpo');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-summary-fpo"
                    onclick="cancelTryOut('GETapi-summary-fpo');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-summary-fpo"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/summary/fpo</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-summary-fpo"
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
                              name="Accept"                data-endpoint="GETapi-summary-fpo"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-summary-fpo"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                    <h2 id="statistics-GETapi-bio-summary">Biometic Summary</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>This endpoint returns the summary of the system statistics</p>

<span id="example-requests-GETapi-bio-summary">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/bio/summary" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/bio/summary"
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

<span id="example-responses-GETapi-bio-summary">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;bio_summary&quot;: 1,
        &quot;possible_duplicates&quot;: 1,
        &quot;denied_captures&quot;: 1
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-bio-summary" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-bio-summary"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-bio-summary"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-bio-summary" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-bio-summary">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-bio-summary" data-method="GET"
      data-path="api/bio/summary"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-bio-summary', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-bio-summary"
                    onclick="tryItOut('GETapi-bio-summary');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-bio-summary"
                    onclick="cancelTryOut('GETapi-bio-summary');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-bio-summary"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/bio/summary</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-bio-summary"
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
                              name="Accept"                data-endpoint="GETapi-bio-summary"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-bio-summary"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                        </form>

                <h1 id="unffe-outreach">UNFFE Outreach</h1>

    <p>APIs for managing UNFFE Outreach</p>

                                <h2 id="unffe-outreach-GETapi-unffe-outreach">Get all UNFFE Outreach</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-unffe-outreach">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/unffe/outreach" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/unffe/outreach"
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

<span id="example-responses-GETapi-unffe-outreach">
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
            &quot;dob&quot;: &quot;2023/02/12&quot;,
            &quot;gender&quot;: &quot;Male&quot;,
            &quot;phone_number&quot;: &quot;0788888888&quot;,
            &quot;id_number&quot;: &quot;CM/123456&quot;,
            &quot;district&quot;: &quot;Kampala&quot;,
            &quot;sub_county&quot;: &quot;Kampala&quot;,
            &quot;parish&quot;: &quot;Kampala&quot;,
            &quot;village&quot;: &quot;Kampala&quot;,
            &quot;fpo_name&quot;: &quot;Kampala&quot;,
            &quot;group_name&quot;: &quot;Kampala&quot;,
            &quot;group_code&quot;: &quot;Kampala&quot;,
            &quot;farm_size&quot;: &quot;4&quot;,
            &quot;crops_grown&quot;: &quot;Matooke&quot;,
            &quot;created_at&quot;: &quot;2023/02/12&quot;,
            &quot;updated_at&quot;: &quot;2023/02/12&quot;
        }
    ],
    &quot;first_page_url&quot;: &quot;http://localhost:8000/api/unffe-outreach?page=1&quot;,
    &quot;from&quot;: 1,
    &quot;last_page&quot;: 1,
    &quot;last_page_url&quot;: &quot;http://localhost:8000/api/unffe-outreach?page=1&quot;,
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
<span id="execution-results-GETapi-unffe-outreach" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-unffe-outreach"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-unffe-outreach"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-unffe-outreach" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-unffe-outreach">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-unffe-outreach" data-method="GET"
      data-path="api/unffe/outreach"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-unffe-outreach', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-unffe-outreach"
                    onclick="tryItOut('GETapi-unffe-outreach');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-unffe-outreach"
                    onclick="cancelTryOut('GETapi-unffe-outreach');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-unffe-outreach"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/unffe/outreach</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-unffe-outreach"
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
                              name="Accept"                data-endpoint="GETapi-unffe-outreach"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="unffe-outreach-POSTapi-unffe-outreach-register">Register UNFFE Outreach</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-unffe-outreach-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/unffe/outreach/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"sit\",
    \"last_name\": \"delectus\",
    \"district\": \"ex\",
    \"sub_county\": \"sunt\",
    \"parish\": \"ea\",
    \"dob\": \"qui\",
    \"gender\": \"Male, Female\",
    \"phone_number\": \"suscipit\",
    \"id_number\": \"totam\",
    \"village\": \"asperiores\",
    \"fpo_name\": \"et\",
    \"group_name\": \"vitae\",
    \"group_code\": \"harum\",
    \"farm_size\": \"consequuntur\",
    \"crops_grown\": \"neque\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/unffe/outreach/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "sit",
    "last_name": "delectus",
    "district": "ex",
    "sub_county": "sunt",
    "parish": "ea",
    "dob": "qui",
    "gender": "Male, Female",
    "phone_number": "suscipit",
    "id_number": "totam",
    "village": "asperiores",
    "fpo_name": "et",
    "group_name": "vitae",
    "group_code": "harum",
    "farm_size": "consequuntur",
    "crops_grown": "neque"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-unffe-outreach-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;message&quot;: &quot;UNFFE Outreach registered successfully&quot;,
&quot;data&quot;: {
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;dob&quot;: &quot;2023/02/12&quot;,
&quot;gender&quot; : &quot;Male&quot;,
&quot;phone_number&quot; : &quot;0788888888&quot;,
&quot;id_number&quot; : &quot;CM/123456&quot;,
&quot;district&quot; : &quot;Kampala&quot;,
&quot;sub_county&quot; : &quot;Kampala&quot;,
&quot;parish&quot; : &quot;Kampala&quot;,
&quot;village&quot; : &quot;Kampala&quot;,
&quot;fpo_name&quot; : &quot;Kampala&quot;,
&quot;group_name&quot; : &quot;Kampala&quot;,
&quot;group_code&quot; : &quot;Kampala&quot;,
&quot;farm_size&quot; : &quot;4&quot;,
&quot;crops_grown&quot; : &quot;Matooke&quot;,
&quot;created_at&quot;: &quot;2023/02/12&quot;,
&quot;updated_at&quot;: &quot;2023/02/12&quot;,
&quot;id&quot;: 1
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: false,
&quot;message&quot;: &quot;Validation Error&quot;,
&quot;data&quot;: {
&quot;first_name&quot;: [
&quot;The first name field is required.&quot;
],
&quot;last_name&quot;: [
&quot;The last name field is required.&quot;
],
&quot;dob&quot;: [
&quot;The dob field is required.&quot;
],

&quot;district&quot;: [
&quot;The district field is required.&quot;
],
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-unffe-outreach-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-unffe-outreach-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-unffe-outreach-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-unffe-outreach-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-unffe-outreach-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-unffe-outreach-register" data-method="POST"
      data-path="api/unffe/outreach/register"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-unffe-outreach-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-unffe-outreach-register"
                    onclick="tryItOut('POSTapi-unffe-outreach-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-unffe-outreach-register"
                    onclick="cancelTryOut('POSTapi-unffe-outreach-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-unffe-outreach-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/unffe/outreach/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-unffe-outreach-register"
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
                              name="Accept"                data-endpoint="POSTapi-unffe-outreach-register"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-unffe-outreach-register"
               value="sit"
               data-component="body">
    <br>
<p>The first name of the UNFFE Outreach. Example: <code>sit</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-unffe-outreach-register"
               value="delectus"
               data-component="body">
    <br>
<p>The last name of the UNFFE Outreach. Example: <code>delectus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="district"                data-endpoint="POSTapi-unffe-outreach-register"
               value="ex"
               data-component="body">
    <br>
<p>The district of the UNFFE Outreach. Example: <code>ex</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sub_county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sub_county"                data-endpoint="POSTapi-unffe-outreach-register"
               value="sunt"
               data-component="body">
    <br>
<p>The sub county of the UNFFE Outreach. Example: <code>sunt</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parish</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="parish"                data-endpoint="POSTapi-unffe-outreach-register"
               value="ea"
               data-component="body">
    <br>
<p>The parish of the UNFFE Outreach. Example: <code>ea</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dob</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dob"                data-endpoint="POSTapi-unffe-outreach-register"
               value="qui"
               data-component="body">
    <br>
<p>The date of birth of the UNFFE Outreach. Example: <code>qui</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-unffe-outreach-register"
               value="Male, Female"
               data-component="body">
    <br>
<p>optional The gender of the UNFFE Outreach. Example: <code>Male, Female</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-unffe-outreach-register"
               value="suscipit"
               data-component="body">
    <br>
<p>The phone number of the UNFFE Outreach. Example: <code>suscipit</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_number"                data-endpoint="POSTapi-unffe-outreach-register"
               value="totam"
               data-component="body">
    <br>
<p>The ID number of the UNFFE Outreach. Example: <code>totam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>village</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="village"                data-endpoint="POSTapi-unffe-outreach-register"
               value="asperiores"
               data-component="body">
    <br>
<p>The village of the UNFFE Outreach. Example: <code>asperiores</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_name"                data-endpoint="POSTapi-unffe-outreach-register"
               value="et"
               data-component="body">
    <br>
<p>The FPO name of the UNFFE Outreach. Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>group_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="group_name"                data-endpoint="POSTapi-unffe-outreach-register"
               value="vitae"
               data-component="body">
    <br>
<p>The group name of the UNFFE Outreach. Example: <code>vitae</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>group_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="group_code"                data-endpoint="POSTapi-unffe-outreach-register"
               value="harum"
               data-component="body">
    <br>
<p>The group code of the UNFFE Outreach. Example: <code>harum</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>farm_size</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="farm_size"                data-endpoint="POSTapi-unffe-outreach-register"
               value="consequuntur"
               data-component="body">
    <br>
<p>The farm size of the UNFFE Outreach. Example: <code>consequuntur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>crops_grown</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="crops_grown"                data-endpoint="POSTapi-unffe-outreach-register"
               value="neque"
               data-component="body">
    <br>
<p>The crops grown of the UNFFE Outreach. Example: <code>neque</code></p>
        </div>
        </form>

                    <h2 id="unffe-outreach-POSTapi-unffe-outreach--id--update">Update UNFFE Outreach</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-unffe-outreach--id--update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/unffe/outreach/et/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"corrupti\",
    \"last_name\": \"aperiam\",
    \"district\": \"ullam\",
    \"sub_county\": \"quia\",
    \"parish\": \"ad\",
    \"dob\": \"et\",
    \"gender\": \"Male, Female\",
    \"phone_number\": \"aut\",
    \"id_number\": \"a\",
    \"village\": \"omnis\",
    \"fpo_name\": \"at\",
    \"group_name\": \"similique\",
    \"group_code\": \"ducimus\",
    \"farm_size\": \"ratione\",
    \"crops_grown\": \"aut\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/unffe/outreach/et/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "corrupti",
    "last_name": "aperiam",
    "district": "ullam",
    "sub_county": "quia",
    "parish": "ad",
    "dob": "et",
    "gender": "Male, Female",
    "phone_number": "aut",
    "id_number": "a",
    "village": "omnis",
    "fpo_name": "at",
    "group_name": "similique",
    "group_code": "ducimus",
    "farm_size": "ratione",
    "crops_grown": "aut"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-unffe-outreach--id--update">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: true,
&quot;message&quot;: &quot;UNFFE Outreach updated successfully&quot;,
&quot;data&quot;: {
&quot;first_name&quot;: &quot;John&quot;,
&quot;last_name&quot;: &quot;Doe&quot;,
&quot;dob&quot;: &quot;2023/02/12&quot;,
&quot;gender&quot; : &quot;Male&quot;,
&quot;phone_number&quot; : &quot;0788888888&quot;,
&quot;id_number&quot; : &quot;CM/123456&quot;,
&quot;district&quot; : &quot;Kampala&quot;,
&quot;sub_county&quot; : &quot;Kampala&quot;,
&quot;parish&quot; : &quot;Kampala&quot;,
&quot;village&quot; : &quot;Kampala&quot;,
&quot;fpo_name&quot; : &quot;Kampala&quot;,
&quot;group_name&quot; : &quot;Kampala&quot;,
&quot;group_code&quot; : &quot;Kampala&quot;,
&quot;farm_size&quot; : &quot;4&quot;,
&quot;crops_grown&quot; : &quot;Matooke&quot;,
&quot;created_at&quot;: &quot;2023/02/12&quot;,
&quot;updated_at&quot;: &quot;2023/02/12&quot;,
&quot;id&quot;: 1
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;UNFFE Outreach not found&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;success&quot;: false,
&quot;message&quot;: &quot;Validation Error&quot;,
&quot;data&quot;: {
&quot;first_name&quot;: [
&quot;The first name field is required.&quot;
],
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-unffe-outreach--id--update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-unffe-outreach--id--update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-unffe-outreach--id--update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-unffe-outreach--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-unffe-outreach--id--update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-unffe-outreach--id--update" data-method="POST"
      data-path="api/unffe/outreach/{id}/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-unffe-outreach--id--update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-unffe-outreach--id--update"
                    onclick="tryItOut('POSTapi-unffe-outreach--id--update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-unffe-outreach--id--update"
                    onclick="cancelTryOut('POSTapi-unffe-outreach--id--update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-unffe-outreach--id--update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/unffe/outreach/{id}/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-unffe-outreach--id--update"
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
                              name="Accept"                data-endpoint="POSTapi-unffe-outreach--id--update"
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
                              name="id"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="et"
               data-component="url">
    <br>
<p>The ID of the outreach. Example: <code>et</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="corrupti"
               data-component="body">
    <br>
<p>The first name of the UNFFE Outreach. Example: <code>corrupti</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="aperiam"
               data-component="body">
    <br>
<p>The last name of the UNFFE Outreach. Example: <code>aperiam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>district</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="district"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="ullam"
               data-component="body">
    <br>
<p>The district of the UNFFE Outreach. Example: <code>ullam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sub_county</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="sub_county"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="quia"
               data-component="body">
    <br>
<p>The sub county of the UNFFE Outreach. Example: <code>quia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parish</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="parish"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="ad"
               data-component="body">
    <br>
<p>The parish of the UNFFE Outreach. Example: <code>ad</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>dob</code></b>&nbsp;&nbsp;
<small>date</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="dob"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="et"
               data-component="body">
    <br>
<p>The date of birth of the UNFFE Outreach. Example: <code>et</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>gender</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="gender"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="Male, Female"
               data-component="body">
    <br>
<p>optional The gender of the UNFFE Outreach. Example: <code>Male, Female</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="aut"
               data-component="body">
    <br>
<p>The phone number of the UNFFE Outreach. Example: <code>aut</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id_number"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="a"
               data-component="body">
    <br>
<p>The ID number of the UNFFE Outreach. Example: <code>a</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>village</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="village"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="omnis"
               data-component="body">
    <br>
<p>The village of the UNFFE Outreach. Example: <code>omnis</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>fpo_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fpo_name"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="at"
               data-component="body">
    <br>
<p>The FPO name of the UNFFE Outreach. Example: <code>at</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>group_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="group_name"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="similique"
               data-component="body">
    <br>
<p>The group name of the UNFFE Outreach. Example: <code>similique</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>group_code</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="group_code"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="ducimus"
               data-component="body">
    <br>
<p>The group code of the UNFFE Outreach. Example: <code>ducimus</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>farm_size</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="farm_size"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="ratione"
               data-component="body">
    <br>
<p>The farm size of the UNFFE Outreach. Example: <code>ratione</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>crops_grown</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="crops_grown"                data-endpoint="POSTapi-unffe-outreach--id--update"
               value="aut"
               data-component="body">
    <br>
<p>The crops grown of the UNFFE Outreach. Example: <code>aut</code></p>
        </div>
        </form>

                    <h2 id="unffe-outreach-DELETEapi-unffe-outreach--id-">Delete UNFFE Outreach</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-unffe-outreach--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://farmers.nauticaltech.ug/api/unffe/outreach/est" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/unffe/outreach/est"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-unffe-outreach--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;message&quot;: &quot;UNFFE Outreach deleted successfully&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: false,
    &quot;message&quot;: &quot;UNFFE Outreach not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-unffe-outreach--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-unffe-outreach--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-unffe-outreach--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-unffe-outreach--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-unffe-outreach--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-unffe-outreach--id-" data-method="DELETE"
      data-path="api/unffe/outreach/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-unffe-outreach--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-unffe-outreach--id-"
                    onclick="tryItOut('DELETEapi-unffe-outreach--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-unffe-outreach--id-"
                    onclick="cancelTryOut('DELETEapi-unffe-outreach--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-unffe-outreach--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/unffe/outreach/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-unffe-outreach--id-"
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
                              name="Accept"                data-endpoint="DELETEapi-unffe-outreach--id-"
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
                              name="id"                data-endpoint="DELETEapi-unffe-outreach--id-"
               value="est"
               data-component="url">
    <br>
<p>The ID of the outreach. Example: <code>est</code></p>
            </div>
                    </form>

                <h1 id="users-management">Users Management</h1>

    <p>APIs for generating and managing users</p>

                                <h2 id="users-management-GETapi-users">Get all users</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Get a list of all users</p>

<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/users" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/users"
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

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-users"
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
                              name="Accept"                data-endpoint="GETapi-users"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="users-management-POSTapi-user-register">Create a new user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Create a new user</p>

<span id="example-requests-POSTapi-user-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/user/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"name\": \"Maurice Kamugisha\",
    \"email\": \"mF5uT@example.com\",
    \"phone_number\": \"256781456492\",
    \"role\": \"admin,user\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/user/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "name": "Maurice Kamugisha",
    "email": "mF5uT@example.com",
    "phone_number": "256781456492",
    "role": "admin,user"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-register">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Maurice Kamugisha&quot;,
        &quot;email&quot;: &quot;mF5uT@example.com&quot;,
        &quot;phone_number&quot;: &quot;256781456492&quot;,
        &quot;role&quot;: &quot;admin&quot;,
        &quot;photo&quot;: &quot;https://ui-avatars.com/api/?name=Maurice+Kamugisha&amp;size=128&quot;,
        &quot;created_at&quot;: &quot;2022-01-01T00:00:00.000000Z&quot;,
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;The given data was invalid.&quot;
    ],
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;Unauthenticated.&quot;
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-user-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-register"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-user-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-register">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-user-register" data-method="POST"
      data-path="api/user/register"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user-register"
                    onclick="tryItOut('POSTapi-user-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user-register"
                    onclick="cancelTryOut('POSTapi-user-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user-register"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-user-register"
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
                              name="Accept"                data-endpoint="POSTapi-user-register"
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
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-user-register"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-user-register"
               value="Maurice Kamugisha"
               data-component="body">
    <br>
<p>The name of the user. Example: <code>Maurice Kamugisha</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-user-register"
               value="mF5uT@example.com"
               data-component="body">
    <br>
<p>The email of the user. Example: <code>mF5uT@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-user-register"
               value="256781456492"
               data-component="body">
    <br>
<p>The phone number of the user. Example: <code>256781456492</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="POSTapi-user-register"
               value="admin,user"
               data-component="body">
    <br>
<p>The role of the user. Example: <code>admin,user</code></p>
        </div>
        </form>

                    <h2 id="users-management-GETapi-user--id-">Get User by id</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Fetch a user by id</p>

<span id="example-requests-GETapi-user--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/user/voluptates" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/user/voluptates"
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

<span id="example-responses-GETapi-user--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Maurice Kamugisha&quot;,
        &quot;email&quot;: &quot;mF5uT@example.com&quot;,
        &quot;phone_number&quot;: &quot;256781456492&quot;,
        &quot;role&quot;: &quot;admin&quot;,
        &quot;photo&quot;: &quot;https://ui-avatars.com/api/?name=Maurice+Kamugisha&amp;size=128&quot;,
        &quot;created_at&quot;: &quot;2022-01-01T00:00:00.000000Z&quot;,
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;Unauthenticated.&quot;
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;User not found.&quot;
    ],
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user--id-" data-method="GET"
      data-path="api/user/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user--id-"
                    onclick="tryItOut('GETapi-user--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user--id-"
                    onclick="cancelTryOut('GETapi-user--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user--id-"
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
                              name="Accept"                data-endpoint="GETapi-user--id-"
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
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-user--id-"
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
                              name="id"                data-endpoint="GETapi-user--id-"
               value="voluptates"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>voluptates</code></p>
            </div>
                    </form>

                    <h2 id="users-management-POSTapi-user--id--update">Update user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update user details</p>

<span id="example-requests-POSTapi-user--id--update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://farmers.nauticaltech.ug/api/user/reprehenderit/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"name\": \"officia\",
    \"email\": \"keshawn90@example.org\",
    \"phone_number\": \"molestiae\",
    \"role\": \"recusandae\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/user/reprehenderit/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "name": "officia",
    "email": "keshawn90@example.org",
    "phone_number": "molestiae",
    "role": "recusandae"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user--id--update">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Maurice Kamugisha&quot;,
        &quot;email&quot;: &quot;mF5uT@example.com&quot;,
        &quot;phone_number&quot;: &quot;256781456492&quot;,
        &quot;role&quot;: &quot;admin&quot;,
        &quot;photo&quot;: &quot;https://ui-avatars.com/api/?name=Maurice+Kamugisha&amp;size=128&quot;,
        &quot;created_at&quot;: &quot;2022-01-01T00:00:00.000000Z&quot;,
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;Unauthenticated.&quot;
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;User not found.&quot;
    ],
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-user--id--update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user--id--update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user--id--update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-user--id--update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user--id--update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-user--id--update" data-method="POST"
      data-path="api/user/{id}/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user--id--update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user--id--update"
                    onclick="tryItOut('POSTapi-user--id--update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user--id--update"
                    onclick="cancelTryOut('POSTapi-user--id--update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user--id--update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/{id}/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-user--id--update"
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
                              name="Accept"                data-endpoint="POSTapi-user--id--update"
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
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-user--id--update"
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
                              name="id"                data-endpoint="POSTapi-user--id--update"
               value="reprehenderit"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>reprehenderit</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-user--id--update"
               value="officia"
               data-component="body">
    <br>
<p>The name of the user Example: <code>officia</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-user--id--update"
               value="keshawn90@example.org"
               data-component="body">
    <br>
<p>The email of the user Example: <code>keshawn90@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>phone_number</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="phone_number"                data-endpoint="POSTapi-user--id--update"
               value="molestiae"
               data-component="body">
    <br>
<p>The phone number of the user Example: <code>molestiae</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>role</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="role"                data-endpoint="POSTapi-user--id--update"
               value="recusandae"
               data-component="body">
    <br>
<p>The role of the user Example: <code>recusandae</code></p>
        </div>
        </form>

                    <h2 id="users-management-PUTapi-user-status-update">Update user status</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update user status</p>

<span id="example-requests-PUTapi-user-status-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://farmers.nauticaltech.ug/api/user/status/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id\": \"laboriosam\",
    \"status\": \"eius\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/user/status/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "laboriosam",
    "status": "eius"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-user-status-update">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Maurice Kamugisha&quot;,
        &quot;email&quot;: &quot;mF5uT@example.com&quot;,
        &quot;phone_number&quot;: &quot;256781456492&quot;,
        &quot;role&quot;: &quot;admin&quot;,
        &quot;photo&quot;: &quot;https://ui-avatars.com/api/?name=Maurice+Kamugisha&amp;size=128&quot;,
        &quot;created_at&quot;: &quot;2022-01-01T00:00:00.000000Z&quot;,
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;The given data was invalid.&quot;
    ],
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;Unauthenticated.&quot;
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-user-status-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-user-status-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-user-status-update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-user-status-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-user-status-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-user-status-update" data-method="PUT"
      data-path="api/user/status/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-user-status-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-user-status-update"
                    onclick="tryItOut('PUTapi-user-status-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-user-status-update"
                    onclick="cancelTryOut('PUTapi-user-status-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-user-status-update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/user/status/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-user-status-update"
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
                              name="Accept"                data-endpoint="PUTapi-user-status-update"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-user-status-update"
               value="laboriosam"
               data-component="body">
    <br>
<p>The id of the user Example: <code>laboriosam</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="PUTapi-user-status-update"
               value="eius"
               data-component="body">
    <br>
<p>The status of the user Example: <code>eius</code></p>
        </div>
        </form>

                    <h2 id="users-management-GETapi-user--id--password-reset">Reset user password</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Reset user password</p>

<span id="example-requests-GETapi-user--id--password-reset">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://farmers.nauticaltech.ug/api/user/labore/password/reset" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id\": \"sit\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/user/labore/password/reset"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "sit"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user--id--password-reset">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Maurice Kamugisha&quot;,
        &quot;email&quot;: &quot;mF5uT@example.com&quot;,
        &quot;phone_number&quot;: &quot;256781456492&quot;,
        &quot;role&quot;: &quot;admin&quot;,
        &quot;photo&quot;: &quot;https://ui-avatars.com/api/?name=Maurice+Kamugisha&amp;size=128&quot;,
        &quot;created_at&quot;: &quot;2022-01-01T00:00:00.000000Z&quot;,
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;The given data was invalid.&quot;
    ],
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;Unauthenticated.&quot;
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;User not found.&quot;
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user--id--password-reset" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user--id--password-reset"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user--id--password-reset"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user--id--password-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user--id--password-reset">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user--id--password-reset" data-method="GET"
      data-path="api/user/{id}/password/reset"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user--id--password-reset', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user--id--password-reset"
                    onclick="tryItOut('GETapi-user--id--password-reset');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user--id--password-reset"
                    onclick="cancelTryOut('GETapi-user--id--password-reset');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user--id--password-reset"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/{id}/password/reset</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user--id--password-reset"
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
                              name="Accept"                data-endpoint="GETapi-user--id--password-reset"
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
                              name="id"                data-endpoint="GETapi-user--id--password-reset"
               value="labore"
               data-component="url">
    <br>
<p>The ID of the user. Example: <code>labore</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-user--id--password-reset"
               value="sit"
               data-component="body">
    <br>
<p>The id of the user Example: <code>sit</code></p>
        </div>
        </form>

                    <h2 id="users-management-PUTapi-user-password-update">Update user password</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Update user password</p>

<span id="example-requests-PUTapi-user-password-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "https://farmers.nauticaltech.ug/api/user/password/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --header "Authorization: required The authorization token. Example: Bearer {token}" \
    --data "{
    \"id\": \"tempore\",
    \"password\": \"bp`M%M(DAU\'MHapk^\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://farmers.nauticaltech.ug/api/user/password/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "required The authorization token. Example: Bearer {token}",
};

let body = {
    "id": "tempore",
    "password": "bp`M%M(DAU'MHapk^"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-user-password-update">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Maurice Kamugisha&quot;,
        &quot;email&quot;: &quot;mF5uT@example.com&quot;,
        &quot;phone_number&quot;: &quot;256781456492&quot;,
        &quot;role&quot;: &quot;admin&quot;,
        &quot;photo&quot;: &quot;https://ui-avatars.com/api/?name=Maurice+Kamugisha&amp;size=128&quot;,
        &quot;created_at&quot;: &quot;2022-01-01T00:00:00.000000Z&quot;,
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;The given data was invalid.&quot;
    ],
}</code>
 </pre>
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;Unauthenticated.&quot;
    ]
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;error&quot;,
    &quot;message&quot;: [
        &quot;User not found.&quot;
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-user-password-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-user-password-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-user-password-update"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-user-password-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-user-password-update">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-user-password-update" data-method="PUT"
      data-path="api/user/password/update"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-user-password-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-user-password-update"
                    onclick="tryItOut('PUTapi-user-password-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-user-password-update"
                    onclick="cancelTryOut('PUTapi-user-password-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-user-password-update"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/user/password/update</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-user-password-update"
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
                              name="Accept"                data-endpoint="PUTapi-user-password-update"
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
                              name="Authorization" class="auth-value"               data-endpoint="PUTapi-user-password-update"
               value="required The authorization token. Example: Bearer {token}"
               data-component="header">
    <br>
<p>Example: <code>required The authorization token. Example: Bearer {token}</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-user-password-update"
               value="tempore"
               data-component="body">
    <br>
<p>The id of the user Example: <code>tempore</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTapi-user-password-update"
               value="bp`M%M(DAU'MHapk^"
               data-component="body">
    <br>
<p>The password of the user Example: <code>bp</code>M%M(DAU'MHapk^`</p>
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
