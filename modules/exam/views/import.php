
<script src="https://cdn.jsdelivr.net/npm/papaparse@5.3.2/papaparse.min.js"></script>

<!-- Form -->
<form class="import-form" enctype="multipart/form-data">
    <input type="hidden" name="exam_id" value="<?=$exam_id?>">
    <div class="row">
        <div class="col-md-12">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Import Questions</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3"></div>
                    <div class="mb-3">
                        <label class="form-label">Upload CSV</label>
                        <input type="file" class="form-control" name="file" id="csvFile" accept=".csv" required>
                    </div>

                    <div class="mb-3" id="responseArea"></div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <a href="{base_url}exam/list" class="btn btn-info"><i class="fa fa-list"></i> List Papers</a>
                </div>
            </div>
        </div>
    </div>



</form>

<!-- JavaScript -->
<script>
    $(document).on('submit', '.import-form', function (e) {
        e.preventDefault();

        const exam_id = $('[name="exam_id"]').val();
        const fileInput = document.getElementById("csvFile");
        const file = fileInput.files[0];

        if (!exam_id) return alert("Invaid Exam.");
        if (!file) return alert("Please select a CSV file.");
        const messages = [];
        Papa.parse(file, {
            header: false,
            skipEmptyLines: true,
            encoding: "UTF-8", 
            complete: function (results) {
                log(results);
                const rows = results.data;
                const valid = [];

                // Optional: Validate header manually
                const headers = rows[0];
                const expected = ['question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_ans'];
                if (headers.length !== expected.length || !expected.every((v, i) => v.toLowerCase() === headers[i].trim().toLowerCase())) {
                    document.getElementById("responseArea").innerHTML = "<b class='text-danger'>❌ Invalid CSV header format.</b>";
                    return;
                }

                for (let i = 1; i < rows.length; i++) {
                    const row = rows[i];
                    const rowNum = i + 1;

                    const q = row[0]?.trim();
                    const a = row[1]?.trim();
                    const b = row[2]?.trim();
                    const c = row[3]?.trim();
                    const d = row[4]?.trim();
                    const ans = row[5]?.trim().toLowerCase();

                    if (!q || !a || !b || !c || !d || !ans) {
                        messages.push(`<b class="text-danger">❌ Row ${rowNum}: Missing field(s).</b>`);
                        continue;
                    }

                    if (!['option_a', 'option_b', 'option_c', 'option_d'].includes(ans)) {
                        messages.push(`<b class="text-danger">❌ Row ${rowNum}: Invalid correct_ans '${ans}'</b>`);
                        continue;
                    }

                    valid.push({
                        question: q,
                        option_a: a,
                        option_b: b,
                        option_c: c,
                        option_d: d,
                        correct_ans: ans,
                        exam_id: parseInt(exam_id)
                    });
                }
                if(messages.length){
                    $('#responseArea').html(messages.join("<br>"));
                    return;
                }
                $.AryaAjax({
                    url: 'question-import',
                    data: { data: JSON.stringify(valid)  }
                }).then((res) => {
                    log(res)
                    messages.push(res.html);
                    $('#responseArea').html(messages.join("<br>"));
                });
            }
        });
    });
</script>