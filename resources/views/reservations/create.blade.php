<x-layout>
    <form action="/reservations/reserve" method="POST" class="mx-auto max-w-7xl grid grid-cols-4 gap-8">
        @csrf
        <div class="col-span-1">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-2.5">Rental Details</h5>
                    <h6 class="text-sm font-bold">Dates & Times</h6>
                    @if (session()->has(['pickup', 'dropoff']))
                        <ul>
                            <li>{{ date('D, M d, Y @ H:i A', strtotime(session('pickup'))) }}</li>
                            <li>{{ date('D, M d, Y @ H:i A', strtotime(session('dropoff'))) }}</li>
                        </ul>
                    @endif
                </div>
                <div class="card-body">
                    <h6 class="text-sm font-bold">Pick-up & Return Location</h6>
                    <span>1234 Some Street, San Francisco, CA 67890</span>
                </div>
                <div class="card-body">
                    <h6 class="text-sm font-bold">Additional Details</h6>
                    <span>Renters Age: @if (session()->has('age'))
                            {{ session('age') }}
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="col-span-3 bg-base-100 w-full rounded-lg shadow-base-300/20 shadow-sm">
            <h5 class="bg-base-300/10 rounded-t-lg p-4 text-xl font-bold">Reservation Form</h5>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">1. Contact Details</h6>
            </div>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="w-96">
                    <label class="label-text" for="fullName">Full Name</label>
                    <input type="text" name="name" placeholder="Enter your full name" class="input"
                        id="fullName" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="phoneNumber">Phone Number</label>
                    <input type="tel" name="number" placeholder="Format: 123-456-7890" class="input"
                        id="phoneNumber" required />
                </div>
                <div class="col-span-2">
                    <label class="label-text" for="emailAddress">Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email address" class="input"
                        id="emailAddress" required />
                </div>
            </div>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">2. Select Vehicle</h6>
            </div>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="w-96 flex flex-row items-end justify-center space-x-2">
                    <div class="flex flex-col w-full">
                        <label class="label-text" for="carType">Type</label>
                        <select class="select" name="vehicle_id" required>
                            <option value="1">Pick-up Truck (Nissan Frontier or similar)</option>
                            <option value="2">Compact Car (Nissan Versa or similar)</option>
                            <option value="3">Luxury Car (BMW 3 Series or similar)</option>
                            <option value="4">Standard SUV (Mitsubishi Outlander or similar)</option>
                            <option value="5">Mini Van (Toyota Sienna or similar)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">3. Optional Protection Products</h6>
            </div>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="col-span-2 space-y-8">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="opt_protection[]" class="switch switch-primary" value="1" />
                        <span>Damage Waiver ($18.95/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>
                                                Collision Damage Waiver (CDW) is not insurance. The purchase of CDW is
                                                optional for Economy to Full size and mandatory for Premium and above.
                                                You may purchase CDW for an additional fee. If you purchase CDW, we
                                                agree, subject to the actions listed on the rental agreement that
                                                invalidate CDW, to contractually waive your responsibility for all or
                                                part of the cost of damage to, or loss of the vehicle. A deductible of
                                                $1000 USD applies. If CDW is declined, renter is responsible for the
                                                full value of damage to the vehicle.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="opt_protection[]" class="switch switch-primary" value="2" />
                        <span>Personal Accident Insurance ($10.95/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>The purchase of Personal Accident Insurance is optional and not required
                                                to rent a vehicle.</li>
                                            <li>
                                                Personal Accident Insurance covers ambulance service, doctors,
                                                hospitalization and nurses for each passenger in the vehicle, with a
                                                maximum limit of $6,900 USD (200,00 DOP) for each passenger in the
                                                vehicle including the driver, up to maximum passenger allowed in the
                                                vehicle. Coverage also includes Accidental Death coverage of $17,250 USD
                                                (500,00 DOP).
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="opt_protection[]" class="switch switch-primary" value="3" />
                        <span>Zero Deductible Coverage ($26.95/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>Zero Deductible Coverage is not insurance. The purchase of ZDC is
                                                optional for the customer.</li>
                                            <li>
                                                The customer may purchase ZDC for an additional fee. If you purchase
                                                ZDC, we agree, subject to the actions listed on the rental agreement
                                                that invalidate the ZDC, to contractually waiver your responsibility for
                                                all costs of damage that may occur to the rental vehicle.
                                            </li>
                                            <li>
                                                When purchased with Collision Damage Waiver or Third Party Liability,
                                                this coverage reduces the customer's deductible to 0.00 USD.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">4. Equipment</h6>
            </div>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="col-span-2 space-y-8">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="equipment[]" class="switch switch-primary" value="1" />
                        <span>Baby Seat ($6.00/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>
                                                Our baby seats conform to government standards. These baby seats are for
                                                newborn babies up to 13kg/28lbs (0 - 15 months). They are compatible
                                                with a 3-point seat belt, belt base or Isofix base.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="equipment[]" class="switch switch-primary" value="2" />
                        <span>Child/Toddler Seat ($6.00/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>Our child seats conform to government standards. These child seats are
                                                for children between 9kg/20lbs to 18kg/40lbs (9 months to 4 years). They
                                                are compatible with a 3-point seat belt, belt base, or Isofix base with
                                                a multi-position reclination.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="equipment[]" class="switch switch-primary" value="3" />
                        <span>Booster Seat ($6.00/Day)</span>
                        <div class="tooltip [--placement:bottom]">
                            <div class="tooltip-toggle">
                                <span class="icon-[tabler--help] hover:text-primary mt-1.5 size-4"></span>
                                <div class="tooltip-content tooltip-shown:opacity-100 tooltip-shown:visible"
                                    role="popover">
                                    <div
                                        class="tooltip-body bg-base-100 text-base-content/80 max-w-xs rounded-lg p-4 text-start">
                                        <span class="text-lg text-base-content">Details</span>
                                        <ul class="mt-4 space-y-1.5 text-xs">
                                            <li>Our booster seats conform to government standards. These booster seats
                                                are highly versatile for children ranging from 15kg/33lbs to 36kg/80lbs
                                                (4 - 12 years). They are compatible with a 3-point seat belt, belt base,
                                                or Isofix base.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">5. Driver's License Details</h6>
                <p class="text-sm text-base-content">
                    Having this information on file allows us to prepare your rental agreement ahead of time, verify
                    your eligibility more quickly, and get you on the road faster. It’s a simple step that can
                    significantly reduce processing time and ensure a smoother, more efficient pickup process.</p>
            </div>
            <div class="grid grid-cols-2 gap-4 p-4 w-fit">
                <div class="w-96">
                    <label class="label-text">Issuing State</label>
                    <select class="select" name="issuing_state" required>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The
                        </option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of
                        </option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav
                            Republic of</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South
                            Sandwich Islands</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States" selected>United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands
                        </option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                </div>
                <div class="w-96">
                    <label class="label-text" for="phoneNumber">Driver's License Number</label>
                    <input type="tel" name="license_number" class="input" id="phoneNumber" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="expDate">Driver's License Expiration Date</label>
                    <input type="date" name="exp_date" placeholder="Enter your full name" class="input"
                        id="expDate" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="issueDate">Driver's License Issue Date</label>
                    <input type="date" name="issue_date" placeholder="Enter your full name" class="input"
                        id="issueDate" required />
                </div>
                <div class="w-96">
                    <label class="label-text" for="birthDate">Date of Birth</label>
                    <input type="date" name="dob" placeholder="Enter your full name" class="input"
                        id="birthDate" required />
                </div>
            </div>
            <div class="w-full p-4">
                <h6 class="text-lg font-semibold">6. Address Details</h6>
            </div>
            <div class="grid grid-cols-2 gap-4 w-fit p-4">
                <div class="w-96">
                    <label class="label-text">Country</label>
                    <select class="select" name="country" id="country" data-toggle="country" data-country=""
                        required>
                    </select>
                </div>
                <div class="w-96">
                    <label class="label-text">State</label>
                    <select class="select" name="state" id="state" data-toggle="state" data-state=""
                        required>
                    </select>
                </div>
                <div class="w-96">
                    <label class="label-text">City</label>
                    <input type="text" name="city" placeholder="Enter city" class="input" required />
                </div>
                <div class="w-96">
                    <label class="label-text">Street Address</label>
                    <input type="text" name="street_address" placeholder="Enter your street address"
                        class="input" required />
                </div>
                <div class="w-96">
                    <label class="label-text">Street Address 2 (Optional)</label>
                    <input type="text" name="street_address_2" placeholder="Enter your street address"
                        class="input" />
                </div>
                <div class="w-96">
                    <label class="label-text">ZIP Code</label>
                    <input type="text" name="zip" placeholder="Enter your ZIP Code" class="input"
                        required />
                </div>
            </div>
            <button type="submit" class="btn btn-primary m-4">Complete Booking</button>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        if (performance.navigation.type == performance.navigation.TYPE_RELOAD || performance.navigation.type ==
            performance.navigation.TYPE_BACK_FORWARD) {
            window.location.href = "{{ route('flush') }}"
        } else {
            console.info("This page is not reloaded");
        }
        $(document).ready(function() {

            populateCountries("country", "state");

            $countryElement = $('#country');
            $stateElement = $('#state');

            $countryElement.val('USA').trigger('change');
            $stateElement.val('Florida');

        });
    </script>

    <script type="text/javascript"
        src="https://www.cssscript.com/demo/generic-country-state-dropdown-list-countries-js/countries.js"></script>
</x-layout>
