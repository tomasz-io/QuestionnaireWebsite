<form action="choose_startups.php" method="post">

  <p class="lead">What's your main area of expertise?</p>

  <div class="radio">
    <label><input type="radio" name="expertise" value="biz">Business / Financial / Investments</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="expertise" value="product">Product Strategy / UX / Design / Communication / Marketing</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="expertise" value="tech">Programming / Engineering / Scientific</label>
  </div>

  <br>
    <p class="lead">How many startups will you evaluate?</p>

  <div class="radio">
    <label class="radio-inline"><input type="radio" name="startupnum" value="a">5</label>
    <label class="radio-inline"><input type="radio" name="startupnum" value="b">10</label>
    <label class="radio-inline"><input type="radio" name="startupnum" value="c">15</label>
  </div>
  <br>

  <p class="lead">What are your main industries?</p>
  <table class="table" id="table">
    <tr>
      <td><input type="checkbox" name="industry[]" id="artdesign" value="art & design"/> <label for="artdesign">Art & Design</label></td>
      <td><input type="checkbox" name="industry[]" id="charity" value="charity & non-profit"/> <label for="charity">Charity & non-profit</label></td>
      <td><input type="checkbox" name="industry[]" id="consumergoods" value="consumer goods"/> <label for="consumergoods">Consumer goods</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" id="education" value="education"/> <label for="education">Education</label></td>
      <td><input type="checkbox" name="industry[]" id="energy" value="energy"/> <label for="energy">Energy</label></td>
      <td><input type="checkbox" name="industry[]" id="family" value="family & home care"/> <label for="family">Family & home care</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" id="fashion" value="fashion & textile"/> <label for="fashion">Fashion & textile</label></td>
      <td><input type="checkbox" name="industry[]" id="financial" value="financial services"/> <label for="financial">Financial services</label></td>
      <td><input type="checkbox" name="industry[]" id="food" value="food/beverages/tobacco"/> <label for="food">Food/beverages/tobacco</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" id="healthcare" value="healthcare"/> <label for="healthcare">Healthcare</label></td>
      <td><input type="checkbox" name="industry[]" id="lifestyle" value="lifestyle & leisure"/> <label for="lifestyle">Lifestyle & leisure</label></td>
      <td><input type="checkbox" name="industry[]" id="marketing" value="marketing & communication"/> <label for="marketing">Marketing & communication</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" id="media" value="media & entertainment"/> <label for="media">Media & entertainment</label></td>
      <td><input type="checkbox" name="industry[]" id="professionalservices" value="professional services"/> <label for="professionalservices">Professional services</label></td>
      <td><input type="checkbox" name="industry[]" id="security" value="security"/> <label for="security">Security</label></td>
    </tr>
    <tr>
      <td><input type="checkbox" name="industry[]" id="semiconductors" value="semiconductors"/> <label for="semiconductors">Semiconductors</label></td>
      <td><input type="checkbox" name="industry[]" id="software" value="software"/> <label for="software">Software</label></td>
      <td><input type="checkbox" name="industry[]" id="techhardware" value="tech hardware"/> <label for="techhardware">Tech hardware</label></td>
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
    <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">

    <button type="submit" class="btn btn-lg btn-primary pull-right">Next</button>

  </div>
</form>
