<h1>Plane {id}</h1>
<form role="form" action="/fleet/submit" method="post">
    {fid}<br/>
    {fmanufacturer}<br/>
    {fmodel}<br/>
    {fprice}<br/>
    {fseats}<br/>
    {freach}<br/>
    {fcruise}<br/>
    {ftakeoff}<br/>
    {fhourly}<br/>
    {zsubmit}
</form>
    {error}
<a href="/fleet/cancel"><input type="button" value="Cancel the current edit"/></a>
<a href="/fleet/delete"><input type="button" value="Delete Plane"/></a>
