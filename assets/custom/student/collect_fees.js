document.addEventListener('DOMContentLoaded', function (e) {
    const batch_Box = $('#batch_id');
    const liststudentBox = $('select[name="student_id"]');
    const viewStructure = $('.view-structure');
    //assets/media/student.png
    batch_Box.on('change', function () {
        var batch_id = $(this).val();
        viewStructure.html('');
        if (!batch_id) {
            $(liststudentBox[1]).html('<option></option>');
            return false;
        }
        $.AryaAjax({
            url: 'student/fetch-student-via-batch',
            data: { batch_id },
            loading_message: 'Fetch Students'
        }).then(function (data) {
            // console.log(data);
            $(liststudentBox[1]).html('<option></option>');
            if (data.data) {
                toastr.success(`Total ${data.data.length} stduents found.`);
                var img = '';
                $.each(data.data, function (index, myData) {
                    img = myData.image == null ? 'NULL' : myData.image;
                    $(liststudentBox[1]).append(`<option value="${myData.student_id}"  data-kt-rich-content-subcontent="${myData.roll_no}" data-kt-rich-content-icon="${img}" >${myData.student_name}</option>`);
                });
                $(liststudentBox[1]).select2({
                    templateSelection: optionFormatSecond,
                    templateResult: optionFormatSecond
                });
            }
            else {
                toastr.error('Students are not Found in this batch.');
            }
        });
    });
    liststudentBox.on('change', function (e) {
        if($(this).hasClass('first')){
            $(liststudentBox[1]).html('<option></option>');
            batch_Box.val('').trigger('change');
        }
        else{
            $(liststudentBox[0]).html('<option></option>')
        }
        var student_id = $(this).val();
        var studentName = $(this).find('option:selected').html();
        // console.log(studentName);
        if (!student_id) {
            toastr.warning('Please Select A Student.');
            viewStructure.html('');
            return false;
        }

        $.AryaAjax({
            url: 'payment/student-fee-structure',
            data: { student_id },
            loading_message: `Fetch ${badge(studentName)} Student Fee Structure..`
        }).then(function (d) {
            // console.log(d);
            viewStructure.html(d.html).find('form').submit(function (e) {
                e.preventDefault();
                // alert('adadasd');
                const form = document.getElementById('my-fee-form');
                // console.log(form);
                const validator = MyFormValidation(form);
                // console.log(validator);
                var ttl = 0;
                var amountData = [];
                if ($('.temp-amount').length) {
                    $(this).find('.fv-plugins-message-container').remove();
                    var index = '',
                        maxValue = 0,
                        type = '',
                        discount = 0;
                    $('.temp-amount').each(function (i,v) {
                        ttl += Number($(this).val())
                        index = $(this).attr('data-index');
                        type = $(this).attr('data-type');
                        type = type == 'undefined' ? '' : type;
                        discount =  Number( filterAmount(($( $('.disount-temp-amount')[i] ).val())) );
                        maxValue = Number($(this).attr('max'));

                        amountData.push({
                            amount: Number($(this).val()),
                            type: type,
                            duration: index,
                            discount : discount
                        });



                        // console.log(index,maxValue);
                        validator.addField(`amount[${index}]`, {
                            validators: {
                                notEmpty: {
                                    message: `The amount must be less than or equal to ${maxValue}`,
                                },
                                numeric: {
                                    message: 'Please enter a valid numeric value'
                                },
                                callback: {
                                    message: `The amount must be less than or equal to ${maxValue}`,
                                    callback: function (input) {
                                        // Your custom validation logic goes here
                                        // Return true if the validation passes, or false if it fails
                                        var value = input.value;
                                        return value <= maxValue; // Example: Validate that the value is less than or equal to 1000
                                    }
                                }
                            }
                        });


                    });
                }

                if (ttl) {
                    // console.log(validator);
                    validator.validate().then(function (status) {
                        // console.log(status);
                        if (status == 'Valid') {
                            var student_id = $('input[name="student_id"]').val(),
                                roll_no = $('input[name="roll_no"]').val(),
                                course_id = $('input[name="course_id"]').val(),
                                center_id = $('input[name="center_id"]').val(),
                                payment_date = $('input[name="payment_date"]').val();
                                description = $('textarea[name="description"]').val();
                                payment_type = $('select[name="payment_type"]').val();
                            // 
                            $.AryaAjax({
                                url: 'payment/collect-fee',
                                data: {
                                    student_id,
                                    roll_no,
                                    course_id,
                                    center_id,
                                    amountData,
                                    payment_date,
                                    description,
                                    payment_type
                                }
                            }).then(function (r) {
                                // console.log(r);
                                if (r.status) {
                                    Swal.fire('Fees Submitted Successfully...');
                                    liststudentBox.trigger('change');
                                }
                            }).catch(function (r) {
                                console.warn(r.myerror);
                            });
                            // console.log({
                            //     student_id,
                            //     roll_no,
                            //     course_id,
                            //     center_id,
                            //     amountData
                            // });
                        }
                        else
                            toastr.error('Please Enter valid Amount of every Transcations.');
                    });
                }
                else {
                    // SwalWarning('Please Select A Month Payment.');
                    driverObj.highlight({
                        element: "#first-transcations",
                        popover: {
                            title: `${$($("#first-transcations").find('th')[0]).text().trim()} fee`,
                            description: `Please Select <b> ${$($("#first-transcations").find('th')[0]).text()}</b> fee amount <b>${$($("#first-transcations").find('td')[0]).length ? $($("#first-transcations").find('td')[0]).html() : ''}</b> for create transcation.`
                        }
                    });
                }

            });
            var stickyElement = document.querySelector("#myfee-form");
            var sticky = new KTSticky(stickyElement);
            $('.current-date').flatpickr({
                maxDate: 'today',
                dateFormat: dateFormat
            });
        }).catch(function (d) {
            if (d) {
                console.warn(d.myerror);
            }
        });
    });

    select2Student(liststudentBox[0]);
    


    $(document).on('change', '.set-fee > input', function () {
        // console.log(form);
        var Boxclass = $(this).attr('id'),
            TempBox = $('.temp-list').find('tbody'),
            tr = $(this).closest('tr'),
            td = $(tr).find('td'),
            th = $($(tr).find('th')[0]).clone();


        get_month = th.text(),
            get_month_year = $(td[0]).html(),
            fee = $(td[1]).html(),
            // cal_fee = $('.per-month-fee').val(),
            ttl = Number($('.enter-fee').val()),
            name = $(this).attr('name'),
            type = $(this).closest('tr').data('type'),
            cal_fee = $(this).val();

        cal_fee = Number(cal_fee);
        log(type);
        var readonly = '';
        if (name == 'admission_fee' || type == 'exam_fee') {
            fee = get_month_year;
            get_month_year = 'One Time';
            readonly = 'readonly';
        }

        if(type == 'exam_fee'){
            get_month_year = `${tr.data('index')} Exam Fee`;
        }



        if ($(this).is(':checked')) {
            if(TempBox.find('tr').length == 0){
                TempBox.append(`<tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Fee</th>
                        <th>Discount</th>
                    </tr>`);
            }
            // ttl += cal_fee ;
            get_month_year = badge(get_month_year);
            TempBox.append(`<tr class="${Boxclass}">
                <td><b >${get_month}</b></td>
                <td>${get_month_year}</td>
                <td class=" form-group">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-rupee"></i></span>
                    <input type="text" class="form-control form-control-sm temp-amount" ${readonly} aria-label="Amount (to the nearest INR)" name="amount[${name}]" data-type="${type}" data-index="${name}" max="${cal_fee}" value="${cal_fee}" autocomplete="off">
                </div>
                </td>
                <td class=" form-group">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-rupee"></i></span>
                    <input type="text" class="form-control form-control-sm disount-temp-amount" ${readonly} aria-label="Discount Amount (to the nearest INR)" name="discount[${name}]" data-type="${type}" data-index="${name}" value="0" autocomplete="off">
                </div>
                </td>
            </tr>`).find('.temp-amount,.disount-temp-amount').on('keyup', cal);
        }
        else {
            // ttl -= cal_fee;

            TempBox.find(`.${Boxclass}`).remove();
            if(TempBox.find('tr').length == 1){
                TempBox.html(``);
            }
        }
        // $('.enter-fee').val(ttl);
        cal();
    })
    

    function filterAmount(amount){
        var cleanedValue = amount.replace(/[^0-9.]/g, ''); // Remove non-numeric characters except dot (.)

        // Ensure there is at most one dot in the cleaned value
        cleanedValue = cleanedValue.replace(/(\..*)\./g, '$1');
        return cleanedValue;
    }
    function cal() {
        var cal_fee = $('.per-month-fee').val();
        var ttl = 0;
        var discount = 0;
        $('.temp-amount').each(function (i,v) {
            var tempAmount = Number( filterAmount(($(this).val())) );
            var dicAmount = Number( filterAmount(($( $('.disount-temp-amount')[i] ).val())) );
            
            ttl += tempAmount ;
            ($(this).val(tempAmount));
            discount += dicAmount;//
            $( $('.disount-temp-amount')[i] ).val(dicAmount);
        });
        $('.ttl-discount').text(discount);
        $('.ttl-payable').text(ttl - discount);
        $('.enter-fee').val(ttl);
        $('.ttl-amount').text(ttl);
    }




});
