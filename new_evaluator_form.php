<form class="form-horizontal" action="complete_evaluator.php" method="post">
    <div class="form-group">
      <label for="first_name" class="col-sm-2 control-label">First name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="first_name" name="first_name">
      </div>
    </div>
    <div class="form-group">
      <label for="last_name" class="col-sm-2 control-label">Last name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="last_name" name="last_name">
      </div>
    </div>

    <div class="radio">
      <label>
        <input type="radio" name="gender" id="gender" value="male">
        male
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="gender" id="gender" value="female">
        female
      </label>
    </div>

    <div class="form-group">
      <label for="linkedin" class="col-sm-2 control-label">LinkedIn url</label>
      <div class="col-sm-4">
        <input type="url" class="form-control" name="linkedIn" id="linkedin">
      </div>
    </div>

    <div class="form-group">
      <label for="organisation" class="col-sm-2 control-label">Organisation</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" id="organisation" name="organisation">
      </div>
    </div>

    <input type="checkbox" name="skillProfile[]" id="biz" value="business"/> <label for="biz">Business</label>
    <br>
    <input type="checkbox" name="skillProfile[]" id="prod" value="product & design"/> <label for="prod">Product & design</label>
    <br>
    <input type="checkbox" name="skillProfile[]" id="sales" value="sales & marketing"/> <label for="sales">Sales & marketing</label>
    <br>
    <input type="checkbox" name="skillProfile[]" id="funding" value="funding"/> <label for="funding">Funding</label>
    <br>
    <input type="checkbox" name="skillProfile[]" id="management" value="human skills & management"/> <label for="management">Human skills & management</label>
    <br>
    <input type="checkbox" name="skillProfile[]" id="technology" value="technology"/> <label for="technology">Technology</label>



    <h4>What languages do you speak?</h4>
    <div class="input-group input-group-lg col-sm-12">
      <input type="text" class="form-control test" id="tokenfield" name="languages" placeholder="Use a comma to separate languages: English, French, German etc."/>
    </div>

    <button type="submit" class="btn btn-lg btn-primary pull-right">Next</button>

</form>

<!-- THIS IS NOT A GOOD SOLUTION. THE ARRAY SHOULD COME FROM php FILE get_tags.php -->
<script>
  $('#tokenfield').tokenfield({
    autocomplete: {
      source: ["French", "English", "German", "Arabic"],
      delay: 100
    },
    showAutocompleteOnFocus: true
  });
</script>
