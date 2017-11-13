<h1>Fleet</h1>
{modebutton}
<br/><br/>

<table class="table">
    <thead>
      <tr>
          <th>ID</th>
          <th>Manufacturer</th>
          <th>Model</th>
      </tr>
    </thead>
    {fleet}
      <tr>
        <td><a href="/fleet/edit/{id}"><input type="button" value="{id}"/></a></td>
        <td>{manufacturer}</td>
        <td>{model}</td>
      </tr>
    {/fleet}
</table>
