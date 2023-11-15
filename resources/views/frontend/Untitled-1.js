











$(document).ready(function() {
    $('#contractorSelect').change(function() {
        $('#contractorForm').submit();
    });

    $('#contractorForm').submit(function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: '/get-projects',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                // Clear the table body
                $('#projectTable tbody').empty();

                // Populate the table with project details
                $.each(response, function(index, projects) {
                    $('#projectTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${projects.title}</td>
                            <td>${projects.company_name}</td>
                            <td>${projects.contructor_name}</td>
                            <td>${projects.contructor_origin}</td>
                            <td>${projects.year}</td>
                            <td>${new Date(projects.created_at).toLocaleString()}</td>
                        </tr>
                    `);
                });
            }
        });
    });
});