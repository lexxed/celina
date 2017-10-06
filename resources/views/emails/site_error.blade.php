<b>{{ $errormsg }}</b>
<br><br>
<br>Method: {{ $request->getMethod() }} 
<br>Uri: {{ $request->getUri() }} 
<br>Ip: {{ $request->getClientIp() }} 
<br>Referer: {{ $request->server('HTTP_REFERER') }} 
<br>Is secure: {{ $request->isSecure() }} 
<br>Is ajax: {{ $request->ajax() }} 
<br>User agent: {{ $request->server('HTTP_USER_AGENT') }} 
<br>Content:<br> {{ nl2br(htmlentities($request->getContent())) }} 
                    