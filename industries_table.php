<form action="choose_startups.php" method="post">
  <p class="lead">What are your main industries?</p>
  <table class="table" id="table">
    <tr>
      <td><input type="checkbox" name="industry[]" value="art & design"/> Art & Design</td>
      <td><input type="checkbox" name="industry[]" value="charity & non-profit"/> Charity & non-profit</td>
      <td><input type="checkbox" name="industry[]" value="consumer goods"/> Consumer goods</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" value="education"/> Education</td>
      <td><input type="checkbox" name="industry[]" value="energy"/> Energy</td>
      <td><input type="checkbox" name="industry[]" value="family & home care"/> Family & home care</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" value="fashion & textile"/> Fashion & textile</td>
      <td><input type="checkbox" name="industry[]" value="financial services"/> Financial services</td>
      <td><input type="checkbox" name="industry[]" value="food/beverages/tobacco"/> Food/beverages/tobacco</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" value="healthcare"/> Healthcare</td>
      <td><input type="checkbox" name="industry[]" value="lifestyle & leisure"/> Lifestyle & leisure</td>
      <td><input type="checkbox" name="industry[]" value="marketing & communication"/> Marketing & communication</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" value="media & entertainment"/> Media & entertainment</td>
      <td><input type="checkbox" name="industry[]" value="professional services"/> Professional services</td>
      <td><input type="checkbox" name="industry[]" value="security"/> Security</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" value="semiconductors"/> Semiconductors</td>
      <td><input type="checkbox" name="industry[]" value="software"/> Software</td>
      <td><input type="checkbox" name="industry[]" value="tech hardware"/> Tech hardware</td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" value="telecommunications"/> Telecommunications</td>
      <td><input type="checkbox" name="industry[]" value="transport/logistics./mobility"/> Transport/logistics/mobility</td>
      <td><input type="checkbox" name="industry[]" value="travel & tourism"/> Travel & tourism</td>
    </tr>
  </table>
  <br>
  <br>
  <p class="lead">List all the tags relevant to your area of expertise. The more tags you provide, the better we can select the right startups for you!</p>
  <input type="text" class="form-control" id="tokenfield" name="tags" placeholder="Enter as many tags as you want"/>
  <input type="hidden" name="email" value='.$email.' >
  <br>
  <button type="submit" class="btn btn-primary pull-right">Next</button>

</form>
