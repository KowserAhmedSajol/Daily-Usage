<label for="{{ $id }}">{{ $label }}</label>
<select name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control select2']) }}>
    <option value="">{{ $placeholder }}</option>
    
    {{-- Loop through the options fetched from the table --}}
    @foreach ($options as $option)
        <option value="{{ $option->id }}">{{ $option->title }}</option>
    @endforeach
</select>

{{-- Include Select2 CSS and JS --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2 on the select element
        $('#{{ $id }}').select2({
            placeholder: '{{ $placeholder }}',
            allowClear: true,
            tags: true // Enable the ability to add new tags
        }).on('select2:select', function (e) {
            // Handle selection of an existing option
        console.log("Create URL:", "{{ $createUrl }}");
            
            var data = e.params.data;
            console.log(data);
            
            // if (data.id === 'new') {
                // Handle the creation of a new option
                console.log("New Option");
                var newOption = data.id;
                console.log(newOption);
                
                if (newOption) {
                    $.ajax({
                        url: "{{ $createUrl }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            value: newOption,
                            columnName: "{{ $columnName }}",
                            table: "{{ $table }}",
                        },
                        success: function (response) {
                            if (response.success) {
                                // Add the new option to the select element
                                var newOptionId = response.id; // Assuming the response contains the new option ID
                                var newOption = new Option(newOption, newOptionId, true, true);
                                $('#{{ $id }}').append(newOption).trigger('change');
                            } else {
                                alert('Failed to create new option.');
                            }
                        },
                        error: function () {
                            alert('An error occurred while creating the new option.');
                        }
                    });
                }
            // }
        });
    });
</script>