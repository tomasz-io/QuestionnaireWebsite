<form action="choose_startups.php" method="post">

  <h4>What's your main area of expertise?</h4>

  <div class="radio">
    <label><input type="radio" name="expertise" value="biz" title="What's your main area of expertise?">Business / Financial / Investments / Sales</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="expertise" value="product">Product Strategy / UX / Design / Communication / Marketing</label>
  </div>
  <div class="radio">
    <label><input type="radio" name="expertise" value="tech">Tech / Programming / Engineering / Scientific</label>
  </div>

  <h4>What industries are you a specialist of?</h4>

  <?php
  $shop = array( array("title"=>"rose", "price"=>1.25 , "number"=>15),
                 array("title"=>"daisy", "price"=>0.75 , "number"=>25),
                 array("title"=>"orchid", "price"=>1.15 , "number"=>7)
               );
  ?>


  <?php
  $rows = array( array("Art & Design", "Charity & nonprofit", "Consumer goods"),
                array("Education", "Energy", "Family & home care"),
                array("Fashion & textile", "Financial services", "Food/beverages/tobacco"),
                array("Healthcare", "Lifestyle & leisure", "Marketing & communication"),
                array("Media & entertainment", "Professional services", "Security"),
                array("Semiconductors", "Software", "Tech hardware"),
                array("Telecommunications", "Transport/logistics/mobility", "Travel & tourism")
               );
  $industryTags = array();
  ?>

  <table class="table" id="tabletest">
    <tbody>
      <?php foreach ($rows as $row): ?>
          <tr>
          <?php foreach ($row as $industry): ?>
            <?php
              $lowercase = strtolower($industry);
              $index = array_search($lowercase, $user_tags);
              $id = str_replace(" ","_", $lowercase); //replace all instances of space in the string with _
              $id = str_replace("\/","_", $id); //replace all isntances of slash '/' in the string _
              if($index !== FALSE){
                  unset($user_tags[$index]);
                  array_push($to_check, $id);
              }
            ?>
            <td><input type="checkbox" name="industry[]" id="<?php echo $id;?>" value="<?php echo strtolower($industry);?>"/> <label for="<?php echo $id;?>"><?php echo $industry;?></label></td>
          <?php endforeach; ?>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <h4>List all the tags relevant to your area of expertise.</h4>
  <p class="desc">The more tags you provide, the better we can match you to startups!</p>
  <div class="input-group input-group-lg col-sm-12">
    <input type="text" class="form-control test" id="tokenfield" name="tags" value="<?php echo implode(',',$user_tags); ?>" placeholder="Use a comma to separate tags: advertising, conversion optimization, content marketing"/>
    <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
  </div>

      <h4>How many startups will you evaluate?</h4>
      <p class="desc">Expect to spend 15 minutes per evaluation</p>

    <div id="startupqty">
      <input type="radio" name="startupnum" value="5" id="five">
      <label for="five">5</label>
      <input type="radio" name="startupnum" value="10" id="ten">
      <label for="ten">10</label>
      <input type="radio" name="startupnum" value="15" id="fifteen">
      <label for="fifteen">15</label>
      <input type="radio" name="startupnum" value="20" id="twenty">
      <label for="twenty">20</label>
      <input type="radio" name="startupnum" value="25" id="twentyfive">
      <label for="twentyfive">25</label>
      <input type="radio" name="startupnum" value="30" id="thirty">
      <label for="thirty">30</label>
      <input type="radio" name="startupnum" value="35" id="thirtyfive">
      <label for="thirtyfive">35</label>
      <input type="radio" name="startupnum" value="40" id="forty">
      <label for="forty">40</label>
      <div class="level" id="lvl5">Better than nothing, right?</div>
      <div class="level" id="lvl10">That's a reasonable start</div>
      <div class="level" id="lvl15">Good, that's very helpful!</div>
      <div class="level" id="lvl20">Wow, we're pretty impressed!</div>
      <div class="level" id="lvl25">You must be a veteran!</div>
      <div class="level" id="lvl30">You really love startups! Don't you?</div>
      <div class="level" id="lvl35">Ok, we owe you dinner :-)</div>
      <div class="level" id="lvl40">Who are you!? Chuck Norris?</div>
    </div>

    <button type="submit" class="btn btn-lg btn-primary pull-right">Next</button>

</form>

<!-- THIS IS NOT A GOOD SOLUTION. THE ARRAY SHOULD COME FROM php FILE get_tags.php -->
<!-- <script>
  $('#tokenfield').tokenfield({
    autocomplete: {
      source: ["asset management","investment banking","finance","lifestyle and leisure","favorite","infrench","gaming","social networking","media & entertainment","coaching","professional services","software","training & coaching","tech hardware","other...","entertainment","social media","music","media","marketing & communication","software development","energy","sales management","security","telecommunications","marketing","design","art & design","financial services","travel & tourism","food","beverages","tobacco","fashion & textile","charity & non-profit","transport","logistics","mobility","agriculture","vegetables","fruit","photography","travel","change management","brand awareness","management consulting","project implementation","it management","marketing strategy","hardware","mobile","mobile applications","rfid","transportation","defense","computer security","defense & military","cloud computing","entrepreneur","it strategy","it service management","open source","enterprise software","water","mobile payments","water management","water supply","energy & cleantech","sports","web","wellness","fitness training","education","healthcare","sme","solar","renewable energy","energy audits","project finance","green technology","clean energy","social enterprise","consumer goods","web development","real time","pricing","web applications","event management","e-commerce","social services","creative development","social innovation","business planning","product launch","sales operations","selling","business development","cooking","food service","sharing economy","fashion","food & beverages","software engineering","advertising","security+","brand communication","share","storage","logistics/supply chain","real estate","government","local government","property owners","portals","tenant","landlord","residential","local marketing","business analysis","business management","design thinking","event","b2b/enterprise","concept development","commercials","community development","data analysis","data management","gps","internet","location based services","social","hobbies","mobile technology","school reform","smart cities","data & analytics","family & home care","database management","data mining","health economics","healthcare it","sensors","seniors","senior living","medical devices","prevention","internet of things","health/medical","business strategy","venture capital","project planning","start-ups","music industry","government affairs","algorithms","security awareness","knowledge management","social networking sites","legal issues","legal services","community relations","agile","information architecture","blogging","leadership development","search","blog marketing","music production","android","cross-platform development","mobile devices","ios","market analysis","equity research","team leadership","market research","writing","blog management","application development","web services","repairing","automotive","sales force effectiveness","automobile","retail","product management","business solutions","consulting","journalism","content aggregation","media alerts","citizen journalism","content licensing","pr & communications","customer experience","user experience","fun","technologically savvy","innovative thinking","customer feedback","advertising sales","product marketing","network optimization","peer counseling","c#","arduino","mobile marketing","saas","mobile advertising","commerce","analytics","social marketing","knowledge sharing","print","print production","strategy development","engineering","mba","project coordination","learning","programming","code","education reform","education technology","html5","pitching","teamwork","team management","delivering","food &amp; beverage","new business development","product innovation","neighborhood revitalization","airlines","video","artificial intelligence","augmented reality","tutorials","virtual reality","news","women's health","insurance","safety","safety management","big data","hr solutions","language skills","semiconductors","language","jobs & recruiting","voip","languages","mentoring","collaborative","voice communications","language teaching","productivity & crm","leisure","video editing","multimedia","interaction design","film production","booking","hotels","online sales","tourism","vacation","hospitality industry","hotel reservations","aeronautics","productivity enhancement","real estate finance","marketing communications","project work","data center","account management","licensing agreements","digital marketing","multi-channel marketing","it solutions","fashion retail","order management","development tools","pos","international business","students","rentals","biotechnology","editorial","social media marketing","public relations","television","web analytics","website development","photo styling","content management","press releases","press","fashion marketing","content creation","website management","content writing","restaurants","fast food","logistics management","b2b ecommerce","hris","collaboration tools","export","growth","international trade","directory services","listings","startups","ecommunications","customization","3d","3d printing","agronomy","technology development","research","creative concept development","reporting &amp; analysis","creative vision","marketing mix","events organisation","food industry","chef","payments","wordpress","leisure travel","supply chain","mobile communications","marketing solutions","time management","application design","small business","editing","hosting","storytelling","virtual","arts","live events","artist representation","hiring","planning","team coordination","art direction","creative direction","film","cognitive science","dance","teaching/mentoring","food styling","furniture","employment","job search","banking","fashion illustration","customer relations","organizational development","organizational effectiveness","governance","program management","negotiation","quality management","risk management","financial accounting","sales process","innovation management","project execution","project portfolio management","flights","flight planning","funding","globalization","ngos","communications strategy","sailing","financial reporting","online advertising","curating","distribution","sustainability","reward strategy","recycling","museums","student services","libraries","c","api","ehealth","embedded systems","health","mental health","image processing","java","psychotherapy","psychiatry","ultrasound","depression","embedded software","diagnostics","disability","emotional intelligence","medical imaging","psychological assessment","psychological testing","human capital management","online marketing","loyalty programs","loyalty marketing","charitable giving","banking & accounting","strategic communications","surveys","marketing effectiveness","marketing research","decoration","gardening","green living","home care","service delivery","family services","peers","community","ecology","energy efficiency","smart grid","analysis","developing talent","style guides","css","web design","art","illustrator","photoshop","community building","digital strategy","website promotion","photo editor","strategic partnerships","technology evaluation","design patterns","technical writing","technical recruiting","technical training","technical analysis","law enforcement","financial analysis","financial modeling","lead generation","medical tourism","graphic design","front-end development","blogger relations","open data","payment gateways","payment systems","payment processing","banking domain","childcare","restaurant management","industrial engineering","connectivity","consumer products","consumer","fitness","solo","creative problem solving","behavioral targeting","link building","affiliate marketing","machine learning","audio","politics","publicity","algorithm design","network architecture","audio engineering","health education","information management","information sharing","computer networking","horses","culture","motion graphics","3d animation","universities","college","educational technology","recruitment advertising","social entrepreneurship","subscription","paypal","shopping carts","aviation","javascript","mysql","php","salesforce.com","software design","international relations","net infrastructure","strategic planning","survey research","hacking","budget management","financial management","human relations","resource management","credit risk","trading","video production","manufacturing","nature","quality","urban design","urban","bicycle","wellbeing","economics","digital design","experience design","billing systems","optimization","savings","service excellence","storage solutions","betting","gambling","exchange connectivity","drug discovery","pharmaceuticals","clinical research","clinical trials","clinical trial management","drug development","clinical data management","legal compliance","assisted living","mobile software","idea generation","conversion optimization","guides","advisor","surfing","ratings","forums","content","loyalty program development","electronics","process improvement","product knowledge","production","textiles","contract management","administrative support","semantic technologies","employee management","employee hiring","legal writing","natural language processing","fashion design","meeting","ticketing","sql server","sharepoint","luxury lifestyle","concierge services","hospitality","rental management","crm software","viral marketing","accounting","content development","content strategy","personal development","learning styles","shipping","agile project management","video games","objective-c","computer science","mathematics","document management","postgresql","scrum","j2ee","project delivery","business process","geomarketing","customer service","customer satisfaction","customer retention","customer focus","strategic thinking","sales growth","lean initiatives","procurement","alternative medicine","service management","retail management","wine","environmental","history","youtube","consultancy","italian cuisine","training skills","decision support","training coordination","international education","drupal","linux","radio broadcasting","diet","mobile solutions","food allergies","life","applied behavior analysis","hardware development","diy","databases","html + css","purchasing","purchasing management","purchasing strategy","commodities","licensing","team building","test automation","bug tracking","supply chain optimization","recipes","trends","accessories","corporate communications","film festivals","html","seo","fundraising","sustainable development","auditing","performance management","performance improvement","credit analysis","workforce development","linkedin","apparel","direct sales","dresses","beauty","hair care","gastronomy","luxury","luxury goods","image analysis","sports management","iphone development","calendars","business intelligence","multilingual","open innovation","reputation management","public-private partnerships","administration","community organizing","brand development","economic development","cosmetics","ebooks","event planning","robotics","documentaries","process engineering","hr consulting","hr transformation","career management","decision making","assessment","evaluation","training &amp; development","pets","pet care","design for manufacturing","consumer behavior","media relations","marketing roi","music licensing","text mining","statistical modeling","data entry","quantitative analysis","fashion shows","cultural awareness","books","event marketing","newsletters","new media","adult education","advisory","culture change","news writing","online research","home","young adults","modeling","psychology","game theory","military","strategic consulting","gameplay","database administration","database design","system administration","ideation","customer acquisition","search engine submission","erp","photo editing","contract negotiation","organizing","json","network security","ruby on rails","ruby","sql","xml","network engineering","toys","marketing concepts","newspaper","drawing","messaging","mesh","environmental issues","environmental sensors","documentation","cms","electronic circuit design","innovative design","privacy","wifi","smartphones","employer branding","word of mouth marketing","referral generation","marketing materials","creative services","architecture","architecture & construction","financial planning","iphone","supermarkets","writing skills","crafts","social bookmarking","supply chain management","public speaking","instructional design","cad","interior design","3d rendering","promotions","artist management","live","venue","cultural diversity"],
      delay: 100
    },
    showAutocompleteOnFocus: true
  });
</script> -->

<script>
  $('#tokenfield').tokenfield({
    autocomplete: {
      source: <?php echo json_encode($to_check); ?>,
      delay: 100
    },
    showAutocompleteOnFocus: true
  });
</script>

<script>
  var tags = <?php echo json_encode($to_check); ?>;
  for (var i = 0; i < tags.length; ++i) {
    var tag = tags[i];
    var element = $(document.getElementById(tag));
    if(element.is(":checkbox")) {
      element.prop("checked", true);
    }
  }
</script>
