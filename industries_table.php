<form action="choose_startups.php" method="post">
  <p class="lead">What are your main industries?</p>
  <table class="table" id="table">
    <tr>
      <td><input type="checkbox" id="artdesign" value="art & design"/> <label for="artdesign">Art & Design</label></td>
      <td><input type="checkbox" id="charity" value="charity & non-profit"/> <label for="charity">Charity & non-profit</label></td>
      <td><input type="checkbox" id="consumergoods" value="consumer goods"/> <label for="consumergoods">Consumer goods</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" id="education" value="education"/> <label for="education">Education</label></td>
      <td><input type="checkbox" id="energy" value="energy"/> <label for="energy">Energy</label></td>
      <td><input type="checkbox" id="family" value="family & home care"/> <label for="family">Family & home care</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" id="fashion" value="fashion & textile"/> <label for="fashion">Fashion & textile</label></td>
      <td><input type="checkbox" id="financial" value="financial services"/> <label for="financial">Financial services</label></td>
      <td><input type="checkbox" id="food" value="food/beverages/tobacco"/> <label for="food">Food/beverages/tobacco</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" id="healthcare" value="healthcare"/> <label for="healthcare">Healthcare</label></td>
      <td><input type="checkbox" id="lifestyle" value="lifestyle & leisure"/> <label for="lifestyle">Lifestyle & leisure</label></td>
      <td><input type="checkbox" id="marketing" value="marketing & communication"/> <label for="marketing">Marketing & communication</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" id="media" value="media & entertainment"/> <label for="media">Media & entertainment</label></td>
      <td><input type="checkbox" id="professionalservices" value="professional services"/> <label for="professionalservices">Professional services</label></td>
      <td><input type="checkbox" id="security" value="security"/> <label for="security">Security</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" id="semiconductors" value="semiconductors"/> <label for="semiconductors">Semiconductors</label></td>
      <td><input type="checkbox" id="software" value="software"/> <label for="software">Software</label></td>
      <td><input type="checkbox" id="techhardware" value="tech hardware"/> <label for="techhardware">Tech hardware</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" id="telecommunications" value="telecommunications"/> <label for="telecommunications">Telecommunications</label></td>
      <td><input type="checkbox" id="transport" value="transport/logistics./mobility"/> <label for="transport">Transport/logistics/mobility</label></td>
      <td><input type="checkbox" id="travel" value="travel & tourism"/> <label for="travel">Travel & tourism</label></td>
    </tr>
  </table>
  <br>
  <br>
  <p class="lead">List all the tags relevant to your area of expertise.</p>
  <p>The more tags you provide, the better we can select the right startups for you!</p>
  <div class="input-group input-group-lg col-sm-12">
  <input type="text" class="form-control" id="tokenfield" name="tags" placeholder="Enter as many tags as you want"/>
  <input type="hidden" name="email" value='.$email.' >
  <button type="submit" class="btn btn-lg btn-primary pull-right">Next</button>

  </div>
</form>
