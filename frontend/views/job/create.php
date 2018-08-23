<?php
/* @var $this yii\web\View */
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2 uppercase"><strong> <i class="icon-briefcase"></i> Post a Job </strong></h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal">
                                <fieldset>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="CompanyName">Company</label>
                                        <div class="col-md-8">
                                            <input id="CompanyName" name="CompanyName" placeholder="Company Name"
                                                   class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="jobTitle">Job Title</label>
                                        <div class="col-md-8">
                                            <input id="jobTitle" name="jobTitle" placeholder="job Title"
                                                   class="form-control input-md" required="" type="text">
                                            <span class="help-block">A great title needs at least 60 characters. </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Category</label>
                                        <div class="col-md-8">
                                            <select name="category-group" id="category-group" class="form-control">
                                                <option value="0" selected="selected"> Select a category...</option>
                                                <option value="111">Accounting</option>
                                                <option value="112">Administration &amp; Office Support</option>
                                                <option value="113">Agriculture, Animals &amp; Conservation</option>
                                                <option value="114">Architecture &amp; Design</option>
                                                <option value="115">Banking &amp; Financial Services</option>
                                                <option value="116">Communications, Advertising, Arts &amp; Media
                                                </option>
                                                <option value="117">Community Services</option>
                                                <option value="118">Construction</option>
                                                <option value="119">Customer Service &amp; Call Centre</option>
                                                <option value="123">Defence &amp; Protective Services</option>
                                                <option value="120">Education &amp; Training</option>
                                                <option value="121">Engineering</option>
                                                <option value="122">Executive &amp; General Management</option>
                                                <option value="130">Health &amp; Medical</option>
                                                <option value="124">Hospitality &amp; Tourism</option>
                                                <option value="125">Human Resources &amp; Recruitment</option>
                                                <option value="126">Information &amp; Communication Technology
                                                    (ICT)
                                                </option>
                                                <option value="127">Insurance &amp; Superannuation</option>
                                                <option value="128">Legal</option>
                                                <option value="129">Manufacturing</option>
                                                <option value="131">Mining &amp; Energy</option>
                                                <option value="132">Real Estate &amp; Property</option>
                                                <option value="133">Retail</option>
                                                <option value="134">Sales</option>
                                                <option value="135">Science</option>
                                                <option value="136">Sport &amp; Recreation</option>
                                                <option value="137">Trades &amp; Services</option>
                                                <option value="138">Transport &amp; Logistics</option>
                                                <option value="Other"> Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textarea">Job Description
                                        </label>
                                        <div class="col-md-8">
                                            <textarea style="height: 250px" class="form-control" id="textarea"
                                                      name="textarea">Job Description</textarea>
                                            <span class="help-block">Describe the responsibilities , experience, skills, or education. </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="Location">Location </label>
                                        <div class="col-md-8">
                                            <input id="Location" name="Location" placeholder="City or Postcode"
                                                   class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Add Type</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="type" id="type">
                                                <option selected="" value="FULLTIME" name="FULLTIME">Full-time
                                                </option>
                                                <option value="PARTTIME" name="PARTTIME">Part-time</option>
                                                <option value="TEMPORARY" name="TEMPORARY">Temporary</option>
                                                <option value="CONTRACT" name="CONTRACT">Contract</option>
                                                <option value="INTERNSHIP" name="INTERNSHIP">Internship</option>
                                                <option value="PERMANENT" name="PERMANENT">Permanent</option>
                                                <option value="Optional" name="Optional">Optional</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="Salary ">Salary </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input id="Salary " name="Salary " class="form-control"
                                                       placeholder="Salary " required="" type="text">
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        Type <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu ">
                                                        <li><a class="dropdown-item">per hour</a></li>
                                                        <li><a class="dropdown-item">per hour</a></li>
                                                        <li><a class="dropdown-item">per month</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    Negotiable </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-subheading"><i class="icon-user fa"></i> <strong>Company
                                            information</strong></div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="textinput-name">Name</label>
                                        <div class="col-md-8">
                                            <input id="textinput-name" name="textinput-name" placeholder="Seller Name"
                                                   class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="seller-email"> Company
                                            Email</label>
                                        <div class="col-md-8">
                                            <input id="Company-email" name="Company-email" class="form-control"
                                                   placeholder="Email" required="" type="text">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <small> Hide the phone number on this jobs.</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="seller-Number">Phone
                                            Number</label>
                                        <div class="col-md-8">
                                            <input id="seller-Number" name="seller-Number" placeholder="Phone Number"
                                                   class="form-control input-md" required="" type="text">
                                        </div>
                                    </div>
                                    <div class="well">
                                        <h3><i class=" icon-certificate icon-color-1"></i> Make your Ad Premium
                                        </h3>
                                        <p>Premium jobs help promote their service by getting their ads more
                                            visibility with more
                                            job candidate what they want faster. <a href="help.html">Learn more</a>
                                        </p>
                                        <div class="form-group">
                                            <table class="table table-hover checkboxtable">
                                                <tr>
                                                    <td>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="optionsRadios"
                                                                       id="optionsRadios0" value="option0" checked>
                                                                <strong>Regular List </strong> </label>
                                                        </div>
                                                    </td>
                                                    <td><p>$00.00</p></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="optionsRadios"
                                                                       id="optionsRadios1" value="option1">
                                                                <strong>Urgent Jobs </strong> </label>
                                                        </div>
                                                    </td>
                                                    <td><p>$10.00</p></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="optionsRadios"
                                                                       id="optionsRadios2" value="option2">
                                                                <strong>Top of the Page Ad </strong> </label>
                                                        </div>
                                                    </td>
                                                    <td><p>$20.00</p></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="optionsRadios"
                                                                       id="optionsRadios3" value="option3">
                                                                <strong>Top of the Page Ad + Urgent Ad </strong>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td><p>$40.00</p></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="Method"
                                                                        id="PaymentMethod">
                                                                    <option value="2">Select Payment Method</option>
                                                                    <option value="3">Credit / Debit Card</option>
                                                                    <option value="5">Paypal</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><p><strong>Payable Amount : $40.00</strong></p></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Terms</label>
                                        <div class="col-md-8">
                                            <label class="checkbox-inline" for="checkboxes-0">
                                                <input name="checkboxes" id="checkboxes-0"
                                                       value="Remember above contact information." type="checkbox">
                                                Remember above contact information. </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-8"><a href="posting-success.html" id="button1id"
                                                                 class="btn btn-success btn-lg">Submit</a></div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 reg-sidebar">
                <div class="reg-sidebar-inner text-center">
                    <div class="promo-text-box"><i class=" icon-lamp fa fa-4x icon-color-1"></i>
                        <h3><strong>Effective Job Postings </strong></h3>
                        <p> The difference between finding mediocre candidates and extraordinary candidates for your
                            clients is a good job posting. </p>
                    </div>
                    <div class="panel sidebar-panel">
                        <div class="panel-heading uppercase">
                            <small><strong> Job Posting Tips</strong></small>
                        </div>
                        <div class="panel-content">
                            <div class="panel-body text-left">
                                <ul class="list-check">
                                    <li> Add Keywords</li>
                                    <li> Use Familiar Job Titles</li>
                                    <li> Give Them Details</li>
                                    <li> Expand Your Location</li>
                                    <li> Easy Read Postings</li>
                                    <li> Keep it simple and expected</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
