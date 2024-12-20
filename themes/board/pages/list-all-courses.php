<div class="container ">

    <div class="row g-4 d-flex">
        <div class="col-12">
            <h4 class="nceb-heading-primary">{institute_course_list_title}</h4>
            <hr class="w-25" style="height:10px;">
        </div>

        <?php
        $courses = $this->db->get_where('course');
        if ($courses->num_rows()) {
            $i = 1;
            foreach ($courses->result() as $course):
                ?>
                <div class="col-md-4 align-self-center">
                    <div class="card course_card">
                        <div class="card-body sp_g3 text-white">
                            <div class="row d-flex">
                                <div class="col-3 align-self-center">
                                    <i class="display-3 nxr-course_icon"></i>
                                </div>

                                <div class="col-9 align-self-center">
                                    <h4>
                                        <?=$course->course_name?> </h4>
                                    <p><?=$course->duration . ' ' . $course->duration_type?> </p>
                                    <button class="btn btn-light btn-sm fw-bold"
                                        data-course_subjects="Understanding common cybersecurity threats?Basic principles of network security?Online security practices &amp; hands-on exercises"
                                        data-course_name="Cyber security Basics &amp; Online Security"
                                        onclick="subModal(this)">View
                                        Subjects</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        }
        ?>



        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g0 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Data Analysis with Excel &amp; Introduction to SQL </h4>
                            <p>1 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Excel functions &amp; data manipulation?Pivot tables &amp; charts?Introduction to SQL &amp; basic database queries"
                                data-course_name="Data Analysis with Excel &amp; Introduction to SQL"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g6 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Introduction to Programming with Python </h4>
                            <p>1 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Basics of Python syntax and data types?Control flow and loops?Functions and basic problem-solving exercises"
                                data-course_name="Introduction to Programming with Python" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g10 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Full Stack Web Development Bootcamp </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Learn both front-end and back-end web development?Cover HTML, CSS, JavaScript, Node.js, Express.js, and databases?Build real-world projects to showcase your skills."
                                data-course_name="Full Stack Web Development Bootcamp" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g12 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Mobile App Development </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Focus on iOS (Swift) or android (Java/Kotlin) app development?Learn to build mobile applications from scratch?Understand the app deployment process"
                                data-course_name="Mobile App Development " onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g5 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Digital Marketing Course </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Cover digital marketing strategies, SEO, social media marketing, and analytics?Learn how to create and manage online advertising campaigns?Understand content marketing and email marketing"
                                data-course_name="Digital Marketing Course" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g6 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Cyber security Fundamentals </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Explore the basics of cybersecurity and ethical hacking?Learn about network security, encryption, and vulnerability assessment.?Understand common cybersecurity threats and countermeasures."
                                data-course_name="Cyber security Fundamentals" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g11 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                3D Modeling and Animation </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to 3D modeling software (Blender, Maya, 3ds Max)?Learn the basics of 3D animation and rendering?Create 3D models and animations"
                                data-course_name="3D Modeling and Animation" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g10 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                E-learning Design </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Explore the design principles for e-learning courses?Learn about instructional design and user engagement in online education?Work on designing e-learning modules"
                                data-course_name="E-learning Design " onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g2 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Motion Graphics </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Explore animation and motion graphics principles?Learn software like Adobe After Effects or Cinema 4D?Create animated graphics and videos"
                                data-course_name="Motion Graphics " onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g12 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Graphic Design </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Learn design principles, color theory, and typography?Gain proficiency in graphic design software like Adobe Photoshop, Illustrator, and InDesign?Work on projects to build a portfolio"
                                data-course_name="Graphic Design" onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Intermediate Programming and Database Management </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Intermediate Programming Concepts?Database Fundamentals?Project Work"
                                data-course_name="Intermediate Programming and Database Management"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g9 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Tally </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Creating and Managing Company Data , Financial Accounting?Inventory Management, Voucher Entry?Taxation , Bank Reconciliation?Financial Statements , Multi-Currency Transactions , Data Backup and Restore"
                                data-course_name="Tally" onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g6 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advance Excel </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Data Analysis and Visualization?Advanced Formulas and Functions?Macros and Automation?Advanced Charting?Dashboards and Reporting?Excel Tips and Tricks"
                                data-course_name="Advance Excel" onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g5 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in DTP </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Desktop Publishing , Graphic Design Basics , Typography , Page Layout Software?Image Editing , Creating and Formatting Text , Working with Graphics?Layout and Composition , Printing and Output , Publication Types?Project Work , Industry Standards and Best Practices"
                                data-course_name="Certificate in DTP" onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g6 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in Data Entry Operator </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Data Entry , Keyboarding Skills ?Data Entry Software , Numeric and Alphanumeric Data Entry?Data Verification Techniques , Data Formatting , Data Security and Confidentiality?Time Management , Use of Data Entry Equipment , Quality Control , Basic Computer Skills?Communication Skills , Workplace Ethics and Professionalism "
                                data-course_name="Certificate in Data Entry Operator" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g4 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Introduction Of Computer Fundamental </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Operating system?Notepad, Word pad?Ms Paint?Assignments"
                                data-course_name="Introduction Of Computer Fundamental" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g5 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate In Office Application </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Computer Fundamentals?Ms-Word?Ms-Excel?Ms- Power Point"
                                data-course_name="Certificate In Office Application" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g7 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in BUSY </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Fundamental of accounting?Busy with GST?Internet"
                                data-course_name="Certificate in BUSY" onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g2 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in C Programming </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of C Programming?Advanced C Programming?Advanced Topics and Practical Applications"
                                data-course_name="Certificate in  C Programming" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g9 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in Search Engine Optimization (SEO) </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Keyword Research  On-Page SEO  Content Quality and Relevance Technical SEO?Link Building  User Experience (UX)  Local SEO?Social Signal  Schema Markup  Regular Content Updates  Analytics and Monitoring?Mobile Optimization  Voice Search Optimization  E-A-T (Expertise  Authoritativeness Trustworthiness)  SEO Audits"
                                data-course_name="Certificate in Search Engine Optimization (SEO)"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g11 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in Word Press Designing </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Choose a Domain and Hosting  Install WordPress  Choose a Theme?Customize Your Theme  Install Essential Plugins  Create Essential Pages?Design Custom Layouts   Add a Navigation Menu  Optimize for SEO?Add Media and Graphics  Set Up Widgets  Mobile Responsiveness?Test and Debug  Backup Your Website"
                                data-course_name="Certificate in Word Press Designing" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g10 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advanced Computer Skills Certificate Program </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Computing?Programming and Software Development?Web Development and Design?Database Management|Networking and Cybersecurity"
                                data-course_name="Advanced Computer Skills Certificate Program"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g5 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advanced Computer Skills Certificate Program </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Computing?Programming and Software Development?Web Development and Design?Database Management|Networking and Cybersecurity?Emerging Technologies?Project Management and Agile Methodologies?Final Project and Capstone"
                                data-course_name="Advanced Computer Skills Certificate Program"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Professional Diploma in Computer Applications </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Computing?Programming Foundations?Office Productivity Software?Database Management|Web Development Basics?Networking and Cybersecurity Fundamentals?Software Development Life Cycle (SDLC)?Final Project and Practical Applications"
                                data-course_name="Professional Diploma in Computer Applications"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g4 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Full Stack Development Bootcamp </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Front-End Development Fundamentals?Front-End Frameworks?Back-End Development Basics?Database Management and Integration|Full Stack Development Tools?Authentication and Authorization?Advanced Topics in Full Stack Development?Final Project and Portfolio Development"
                                data-course_name="Full Stack Development Bootcamp" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g3 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in Comprehensive IT Training Program </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Information Technology?Programming and Software Development?Web Development and Design?Database Management|Networking and Cybersecurity?System Administration and IT Infrastructure?IT Project Management and Best Practices?Emerging Technologies and Final Project"
                                data-course_name="Certificate in Comprehensive IT Training Program"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g5 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Technology Proficiency Program </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Technology?Programming and Software Proficiency?Web Development and Design Proficiency?Database Management Proficiency|Networking and Cybersecurity Proficiency?System Administration and Cloud Proficiency?IT Project Management and Collaboration?Emerging Technologies and Application"
                                data-course_name="Technology Proficiency Program" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g9 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in Computer Science Essentials </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Computer Science?Programming Fundamentals?Data Structures and Algorithms?Web Development Basics|Database Management Concepts?Networking and Operating Systems?Software Engineering Principles"
                                data-course_name="Certificate in Computer Science Essentials "
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Information Technology Foundations </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Information Technology?Computer Hardware and Software Essentials?Networking Fundamentals?Security and Cybersecurity Basics|Database Management Foundations?Web Technologies Basics?IT Project Management Principles?Emerging Technologies and Final Project"
                                data-course_name="Information Technology Foundations " onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g11 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Digital Skills Intensive Program </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Digital Literacy and Essentials?Graphic Design and Multimedia Basics?Web Development Fundamentals?Social Media Management|Digital Marketing Essentials?Data Analytics and Visualization?E-commerce and Online Sales?Emerging Technologies and Capstone Project"
                                data-course_name="Digital Skills Intensive Program" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g7 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Extended Computer Science Training </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Extended Computer Science?Programming Foundations?Web Development and Advanced Programming?Database Management and Big Data|Networking and Cybersecurity?Operating Systems and System Architecture?Software Engineering and Project Management?Emerging Technologies and Final Project"
                                data-course_name="Extended Computer Science Training" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g12 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                IT Professional Development Program </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Professional Skills for IT Professionals?Advanced Programming and Software Development?Systems and Network Administration?Database Management and Analytics|Cloud Computing and DevOps Practices?Cybersecurity and Ethical Hacking?Project Management and Leadership in IT?Emerging Technologies and Capstone Project"
                                data-course_name="IT Professional Development Program" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g10 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advanced IT Solutions Training </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Advanced IT Solutions Overview?Cloud Computing and Virtualization?Cybersecurity and Threat Intelligence?Big Data Analytics and Business Intelligence|AI and Machine Learning Applications?IoT Integration and Smart Systems?DevOps and Continuous Integration?Final Project and Showcase"
                                data-course_name="Advanced IT Solutions Training" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g4 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Mastering Computer Technologies Program </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Computer Technologies?Advanced Programming and Software Development?Web Technologies and Full Stack Development?Database Management and Data Integration|Networking and Cybersecurity Mastery?Cloud Computing and DevOps Practices?AI and Machine Learning Applications?Emerging Technologies and Capstone Project"
                                data-course_name="Mastering Computer Technologies Program" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g11 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in BASIC and BUSY </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Fundamental of Computer?MS Office?Fundamental of Accounting?BUSY with GST?Internet"
                                data-course_name="Certificate in BASIC and BUSY" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate In Ms- Office Application </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Ms- DOS?Ms-Word?Ms-Excel?Internet"
                                data-course_name="Certificate In Ms- Office Application" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g4 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Taxation and Accountancy&nbsp; </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Accounting and Audit Practice?Fundamentals of Accounting?Indian Banking System?Capital Market?GST Registration?GST Return Filing"
                                data-course_name="Diploma in Taxation and Accountancy&nbsp;"
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advanced Diploma in Computer Science and Technology </h4>
                            <p>12 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Computer Science ?Programming and Software Development ?Web Development and Design?Database Management and Integration |Networking and Cybersecurity ?System Administration and IT Infrastructure ?Software Engineering and Project Management ?Emerging Technologies and Capstone Project "
                                data-course_name="Advanced Diploma in Computer Science and Technology"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g12 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Professional Diploma Program in Information Technology </h4>
                            <p>12 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Information Technology?Programming and Software Development?Web Development and Design?Database Management|Networking and Cybersecurity Fundamentals?System Administration and IT Infrastructure?IT Project Management and Best Practices?Emerging Technologies and Final Project"
                                data-course_name="Professional Diploma Program in Information Technology"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g3 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Comprehensive Computer Science and Engineering Program </h4>
                            <p>12 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Computer Science?Programming and Software Development?Web Development and Design?Database Management and Integration|Networking and Cybersecurity?System Administration and IT Infrastructure?Software Engineering and Project Management?Emerging Technologies and Capstone Project"
                                data-course_name="Comprehensive Computer Science and Engineering Program"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g4 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advanced Diploma in Software Development </h4>
                            <p>12 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Software Engineering?Advanced Programming and Algorithm Design?Web Development and Design?Database Management and Integration|Networking and Cybersecurity for Developers?System Architecture and Cloud Computing ?Software Testing and Quality Assurance?Emerging Technologies and Capstone Project"
                                data-course_name="Advanced Diploma in Software Development"
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g11 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Mastering IT A Yearlong Immersive Program </h4>
                            <p>12 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Information Technology?Programming and Software Development?Web Development and Design?Database Management and Integration|Networking and Cybersecurity?System Administration and Cloud Computing?Software Engineering and Project Management?Emerging Technologies and Capstone Project "
                                data-course_name="Mastering IT  A Yearlong Immersive Program"
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Advanced Computing Technologies </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Advanced Computing?Advanced Programming and Algorithm Design?Web Development and Design?Database Management and Big Data Analytics|Networking and Cybersecurity?Cloud Computing and DevOps Practices?Emerging Technologies and Capstone Project"
                                data-course_name="Diploma in Advanced Computing Technologies"
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g7 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                IT Mastery Program of Comprehensive Learning </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of IT?Programming and Software Development?Web Development and Design?Database Management and Integration|Networking and Cybersecurity?System Administration and Cloud Computing?Software Engineering and Project Management?Emerging Technologies and Capstone Project"
                                data-course_name="IT Mastery Program of Comprehensive Learning"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g3 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advanced Diploma in Computer Systems and Applications </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundations of Computer Systems?Advanced Programming and Software Development?Web Development and Design?Database Management and Integration|Networking and Cybersecurity?System Administration and IT Infrastructure?Software Engineering and Project Management?Emerging Technologies and Capstone Project "
                                data-course_name="Advanced Diploma in Computer Systems and Applications"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g5 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                ADVANCED DIPLOMA IN COMPUTER APPLICATION (ADCA) </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Fundamental of Computer?WINDOWS and DOS ACCESSORIES PROGRAM? Ms-OFFICE (Ms-Word, Ms Excel, Ms Power Point)?PHOTOSHOP| BASIC PROGRAMMING LANGUAGE?TALLY ERP 9?INTERNET?CONFIGURE NET WITH OUTLOOK BASIC HARDWARE and SOFTWARE TROUBLESHOOTING"
                                data-course_name="ADVANCED DIPLOMA IN COMPUTER APPLICATION (ADCA)"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g6 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Integrated Diploma in Business and Financial Management </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Business Fundamentals?Financial Management?Integrated Curriculum?Practical Application|Technology Integration?Communication and Analytical Skills?Ethics and Compliance?Industry-Relevant Content"
                                data-course_name="Integrated Diploma in Business and Financial Management"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g4 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advance Diploma in&nbsp;Graphics and Animation&nbsp;&nbsp; </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Graphic Design Fundamentals?Animation Techniques?Software Proficiency?Storyboarding and Visualization?Digital Media Production|Web and Interactive Design?Portfolio Development?Industry Trends and Professional Practices?Collaborative Projects?Internship Opportunities"
                                data-course_name="Advance Diploma in&nbsp;Graphics and Animation&nbsp;&nbsp;"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g2 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advance Diploma in Computer&nbsp;&nbsp;Hardware and Networking </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Computer Hardware Fundamentals?Networking Basics?Operating Systems?Hardware Installation and Maintenance?Network Administration?Security Principles|Troubleshooting and Maintenance?Virtualization?Wireless Networking?Industry Certifications?Internship Opportunities"
                                data-course_name="Advance Diploma in Computer&nbsp;&nbsp;Hardware and Networking"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g7 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advance Diploma in Animation </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Animation Techniques?Storyboarding and Scriptin?Character Design and Modeling?Rigging and Animation Tools?Visual Effects (VFX)?3D Modeling and Texturing|Digital Sculpting?Animation for Games?Industry-Relevant Software?Portfolio Development?Collaborative Projects?Industry Trends and Professional Practices"
                                data-course_name="Advance Diploma in Animation" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g10 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                &nbsp;Advance Diploma in AutoCad </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="AutoCAD Fundamentals?Advanced 2D Drafting?3D Modeling with AutoCAD?AutoCAD Customization:?Parametric Design?Advanced Rendering|Industry Standards and Best Practices?Collaborative Projects?Certification Preparation?Internship or Work Placement?Software Integration"
                                data-course_name="&nbsp;Advance Diploma in AutoCad" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g9 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advance Diploma in Interior and Designing </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Design Principles?Architectural Elements?Furniture Design?Space Planning?3D Modeling and Visualization?Material Selection|Color Schemes and Lighting?Client Communication?Building Codes and Regulations?Environmental Sustainability|Portfolio Development?Collaborative Projects?Industry Trends and Emerging Technologies?Professional Practices"
                                data-course_name="Advance Diploma in Interior and Designing"
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g7 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Advance Diploma in Revit Design&nbsp; </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to BIM?Revit Interface and Navigation?Architectural Design?Structural Design?MEP (Mechanical, Electrical, Plumbing) Systems|Family Creation?Collaboration and Coordination?Construction Documentation?Phasing and Design Options?Rendering and Visualization|Project Management?Parametric Design?Industry Standards and Best Practices?Portfolio Development?Internship Opportunities"
                                data-course_name="Advance Diploma in Revit Design&nbsp;" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g6 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Computer Networking </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Networking Fundamentals?Network Architecture?Network Operating Systems?Router and Switch Configuration?TCP/IP Protocol Suite|Network Security?Wireless Networking?Network Design and Implementation?Troubleshooting and Maintenance?Virtualization|Industry Certifications?Collaborative Projects?Internship Opportunities?Emerging Technologies"
                                data-course_name="Diploma in Computer Networking" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g5 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Multimedia and Animation </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Multimedia Fundamentals?Graphic Design?Animation Techniques?Storyboarding and Scripting?Digital Audio and Video Editing|3D Modeling and Texturing?Interactive Design?Web Design?Digital Media Production?Motion Graphics|Industry-Standard Software?Portfolio Development?Collaborative Projects?Internship Opportunities?Industry Trends and Emerging Technologies"
                                data-course_name="Diploma in Multimedia and Animation" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g6 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in office Automation and Publishing </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Office Productivity Software?Desktop Publishing (DTP) Software?Graphics Editing Software?Document Management Systems?Data Entry and Database Management:?Typing and Keyboarding Skills|Multimedia Presentations?Web Publishing?Document Conversion and Export?Business Communication Skills?Project Work and Practical Experience?Professional Development"
                                data-course_name="Diploma in office Automation and Publishing"
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g4 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in office Management Application </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Office Management Principles?Administrative Procedures?Computer Applications:?Database Management:?Business Communication?Customer Service Skills|Financial Management?Project Management?Office Technology?Records Management?Ethics and Professionalism?Career Development"
                                data-course_name="Diploma in office Management Application"
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Computerised Financial Accounting </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Financial Accounting Fundamentals?Computerized Accounting Software?Chart of Accounts?Accounts Receivable and Accounts Payable?Bank Reconciliation?Inventory Management|Payroll Processing?Financial Reporting and Analysis?Budgeting and Forecasting?Taxation?Auditing and Internal Controls?Professional Ethics and Standards"
                                data-course_name="Diploma  in Computerised Financial Accounting"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g3 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma Computer Skill </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Basic Computer Operations?Word Processing?Spreadsheets?Presentation Software?Email and Internet?Basic Programming Concepts|Database Management?Basic Graphic Design?Cybersecurity Awareness?Troubleshooting and Maintenance"
                                data-course_name="Diploma Computer Skill" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g2 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Computer Teacher Trianing </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Educational Psychology?Pedagogical Techniques?Curriculum Development?Assessment and Evaluation?Classroom Management|Special Education and Inclusive Practices?Technology Integration?Professional Ethics and Legal Issues?Practicum or Teaching Experience?Reflective Practice and Professional Development"
                                data-course_name="Diploma in Computer Teacher Trianing" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g10 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                CCTV Installation &amp; Troubleshooting </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Basic Electronics?Cctv System Design?Camera Selection?Camera Installation|Power Supply Systems?Lens Selection?Video Signal &amp; Control Signal Transmission?Networking?Fault Finding &amp; Troubleshooting"
                                data-course_name="CCTV Installation &amp; Troubleshooting" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g11 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma In Computer Application </h4>
                            <p>6 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Fundamental of Computer?Ms- Office (Word, Excel, Access, Power Point)?Internet|Photoshop ?Concept of Software &amp; Hardware?Project Work"
                                data-course_name="Diploma In Computer Application " onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Computer Aided Tool Designer </h4>
                            <p>18 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="CAD Software?Tool Design Principles?Geometric Dimensioning and Tolerancing|Material Science?Manufacturing Processes?Computer Numerical Control (CNC) Machining|Tooling Components?Simulation and Analysis?Safety and Regulations?Quality Control"
                                data-course_name="Computer Aided Tool Designer" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g10 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                PG Diploma in Data Science and Analytics </h4>
                            <p>18 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Foundational Concepts?Programming Languages?Data Wrangling and Cleaning?Statistical Analysis|Machine Learning?Big Data Technologies?Data Visualization?Deep Learning|Data Mining?Business Analytics?Ethics and Privacy?Capstone Project"
                                data-course_name="PG Diploma in Data Science and Analytics "
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g7 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Information Technology (DIT) </h4>
                            <p>18 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Fundamentals of Information Technology?Programming Fundamentals?Database Management Systems?Web Development|Networking Fundamentals?Operating Systems?Information Security?Software Development Lifecycle|IT Project Management?IT Support and Troubleshooting?Emerging Technologies?Professional Development"
                                data-course_name="Diploma in Information Technology (DIT)" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g6 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Web Designing and Development </h4>
                            <p>18 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Web Technologies?HTML (Hypertext Markup Language)?CSS (Cascading Style Sheets)?JavaScript?Responsive Web Design|User Experience (UX) Design?Graphic Design Basics?Web Design Tools?Server-Side Scripting?Database Integration?Content Management Systems|Version Control Systems?Web Hosting and Domain Management?Search Engine Optimization?Web Security?Professional Development"
                                data-course_name="Diploma in Web Designing and Development"
                                onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g2 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Development in Computer Hardware and Networking </h4>
                            <p>18 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Computer Fundamentals?Operating Systems?Computer Assembly and Maintenance?Computer Networking Fundamentals?Local Area Network (LAN) Setup and Configuration|Wireless Networking?Internet Connectivity?Network Security?Network Troubleshooting?Introduction to Servers|Introduction to Virtualization?Remote Access and VPNs?Cloud Computing Basics?Professional Development"
                                data-course_name="Development in Computer Hardware and Networking"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g9 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Software Testing </h4>
                            <p>18 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Software Testing?Software Development Lifecycle?Testing Fundamentals?Types of Testing?Testing Techniques?Test Case Design|Test Automation?Defect Management?Performance Testing?Security Testing?Usability Testing?Mobile App Testing|Agile Testing?Software Quality Assurance?Industry Standards and Certifications?Professional Development?Placement Assistance"
                                data-course_name="Diploma in Software Testing" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g7 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Digital Marketing </h4>
                            <p>18 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Digital Marketing?Website Development and Management?Search Engine Optimization?Search Engine Marketing?Social Media Marketing ?Content Marketing|Email Marketing?Inbound Marketing?Analytics and Data Interpretation?Conversion Rate Optimization?Affiliate Marketing?Mobile Marketing|Digital Marketing Strategy and Planning?Brand Management and Online Reputation Management ?Legal and Ethical Considerations?Industry Trends and Emerging Technologies?Professional Development and Certification"
                                data-course_name="Diploma in Digital Marketing" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g4 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Mobile App Development </h4>
                            <p>18 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Introduction to Mobile App Development?Mobile App Platforms?Programming Languages?Integrated Development Environments?User Interface?App Development Tools and Frameworks|Mobile App Architecture?Database Integration?Networking and Web Services?App Testing and Debugging?App Deployment and Distribution?App Monetization Strategies|App Analytics and Performance Optimization?Security and Privacy Considerations?Emerging Technologies and Trends?Professional Development and Industry Certifications:"
                                data-course_name="Diploma in Mobile App Development" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g7 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                POST GRADUATION DIPLOMA IN COMPUTER APPLICATION ( PGDCA) </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Computer Concept &amp; Fundamentals?Ms office 2007,2013 (word,excel,and powerpoint)?Interenet &amp; E-mail?Project work in Ms-word &amp; Ms-excel?Programing in C , C++|Photoshop?Tally erp 9.0 with GST?English, Hindi Typing?Multimedia (Print,Scan,Xerox)?Data entry"
                                data-course_name="POST GRADUATION DIPLOMA IN COMPUTER APPLICATION ( PGDCA)"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g2 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Data Entry Management </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Basic Computer Knowledge?Data Sourcing?Data Processing|Data Entry?Data Analysis?Data Management"
                                data-course_name="Diploma in Data Entry Management" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g5 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma In Fashion Dress Designing &amp; Tailoring </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Stitching Techniques?Dress Measurements &amp; Techniques?Anatomy of Drafting Garments|Anatomy of Drafting Garments?Calculations and Drafting Patterns?Method to Fold the Fabric for Patterns?Summer frock, Yoke Frock, Frock with a Separate Body &amp; Skirt"
                                data-course_name="Diploma In Fashion Dress Designing &amp; Tailoring"
                                onclick="subModal(this)">View Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Diploma in Cutting &amp; Tailoring </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="ntroduction to Sewing Machine, Tools and Equipment's used in Tailoring?Trade Terminology, Measurement Taking|Construction Skills, Basic Stitching?Simple Cutting and Stitching, Fittings"
                                data-course_name="Diploma in Cutting &amp; Tailoring" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g5 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Primary School Teacher Training Program </h4>
                            <p>1 Year </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Nursery Teacher Training|Primary Teacher Training"
                                data-course_name="Primary School Teacher Training Program" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4 align-self-center">
            <div class="card course_card">
                <div class="card-body sp_g8 text-white">
                    <div class="row d-flex">
                        <div class="col-3 align-self-center">
                            <i class="display-3 nxr-course_icon"></i>
                        </div>

                        <div class="col-9 align-self-center">
                            <h4>
                                Certificate in Auto CAD </h4>
                            <p>3 Month </p>
                            <button class="btn btn-light btn-sm fw-bold"
                                data-course_subjects="Auto CAD Interface?Sketch Entities &amp; Sketch Tools?Block, W-block, X-attach &amp; X-Ref?Dimensions &amp; Dimension Styles?Sketech Visualization &amp; Sketch Analysis"
                                data-course_name="Certificate in Auto CAD" onclick="subModal(this)">View
                                Subjects</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
<br>