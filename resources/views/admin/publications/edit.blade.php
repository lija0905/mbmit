@extends('layouts.dashboard-layout')
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<!-- Breadcrumb-->
@section('css')
    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

@endsection


@section('content')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-header"><strong>Izmeni publikaciju</strong></div>
                            <div class="card-body">
                                <div class="alert alert-success d-none response-div">
                                    <div class="response-message"></div>
                                </div>
                                <form id="addPublicationForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable">
                                            <tbody>
                                            <tr>
                                                <th>Title</th>
                                                <td>
                                                    <input class="form-control" name="title" id="title" type="text" value="{{ $publication->title }}"/>

                                                    <span class="invalid-feedback d-none" id="error-title" role="alert">
                                                            <strong id="error-message-title"></strong> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Naziv</th>
                                                <td>
                                                    <input class="form-control" name="naziv" id="naziv" type="text" value="{{ $publication->naziv }}" />

                                                    <span class="invalid-feedback d-none" id="error-naziv" role="alert">
                                                            <strong id="error-message-naziv"></strong> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Abstract</th>
                                                <td>
                                                    <textarea rows="4" class="form-control" name="abstract" id="abstract" type="text">{{ $publication->abstract }}</textarea>

                                                    <span class="invalid-feedback d-none" id="error-abstract" role="alert">
                                                            <strong id="error-message-abstract"></strong> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Opis</th>
                                                <td>
                                                    <textarea rows="4" class="form-control" name="opis" id="opis" type="text">{{ $publication->opis }}</textarea>

                                                    <span class="invalid-feedback d-none" id="error-opis" role="alert">
                                                            <strong id="error-message-opis"></strong> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Link</th>
                                                <td>
                                                    <input class="form-control" name="link" id="link" type="text" value="{{ $publication->link }}"/>

                                                    <span class="invalid-feedback d-none" id="error-link" role="alert">
                                                            <strong id="error-message-link"></strong> </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tip</th>
                                                <td>
                                                    <select class="form-control" id="type_id" name="type_id">
                                                        @foreach($publications_type as $type)
                                                            <option @if($publication->type_id == $type->id) selected @endif value="{{ $type->id }}">{{ $type->type_name_rs }}/{{ $type->type_name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="d-inline-flex mb-3">
                                            <div id="add_existing_author" class="mr-3">
                                                <a class="cursor-pointer" data-toggle="modal" data-target="#addExistingAuthorModal">
                                                    <svg class="icon">
                                                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                                                    </svg>&nbsp;Dodaj autora iz liste postojećih istraživača
                                                </a>
                                            </div>
                                            <div id="add_new_author">
                                                <a class="cursor-pointer"  data-toggle="modal" data-target="#addNewAuthorModal">
                                                    <svg class="icon">
                                                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-plus"></use>
                                                    </svg>&nbsp;Dodaj novog autora
                                                </a>
                                            </div>
                                        </div>
                                            <div class="col-lg-6">
                                                <h6>Autori</h6>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered datatable" id="authors_table">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Ime i Prezime</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if (count($publication->authors) > 0)
                                                        @foreach($publication->authors as $author)
                                                            <tr>
                                                                <td><input class="publication_authors" type="hidden" id="author_{{ $author->id }}" value="{{ $author->id }}"/>{{ $author->id }}</td>
                                                                <td>{{ $author->fullname }}</td>
                                                                <td class="w-25"><a type="button" class="btn btn-danger text-white w-100" id="remove_author_{{$author->id}}" data-id="">Ukloni autora</a></td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                    <button type="submit" class="btn btn-light-green">Sačuvaj</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal For Adding Existing Author -->
    <div class="modal" tabindex="-1" role="dialog" id="addExistingAuthorModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dodaj autora iz liste postojećih istraživača </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="select_existing_author" class="mb-2 f-weight-600">Izaberite autora</label>
                    <select id="select_existing_author" class="form-control selectpicker" data-live-search="true" data-live-search-placeholder="Search...">
                        @foreach($researchers as $researcher)
                            <option value="{{ $researcher->id }}_{{ $researcher->fullname }}">{{ $researcher->fullname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-light-green add_author" id="addExistingAuthor">Dodaj autora</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal For Adding New Author -->
    <div class="modal" tabindex="-1" role="dialog" id="addNewAuthorModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dodaj autora iz liste postojećih istraživača </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class="mb-2" for="new_author_fullname">Ime i prezime</label>
                    <input type="text" class="form-control mb-2" name="new_author_fullname" id="new_author_fullname">

                    <label class="mb-2" for="new_author_title">Title</label>
                    <input type="text" class="form-control mb-2" name="new_author_title" id="new_author_title">

                    <label class="mb-2" for="new_author_titula">Titula</label>
                    <input type="text" class="form-control mb-2" name="new_author_titula" id="new_author_titula">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                    <button type="button" class="btn btn-light-green add_author" id="addNewAuthor">Dodaj autora</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <!-- Bootstrap Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

    <script>
        let authors = {};
        let new_authors = {};

        let countRows = 0;

        $(document).ready(function() {
            $('.selectpicker').selectpicker();

            //initialize authors
            $('.publication_authors').each(function(i, obj) {
                authors[countRows] = $(this).val();
                $("#remove_author_"+$(this).val()).attr("data-id", countRows++);
            });
        });

        $(".add_author").on('click', function() {
            let table = document.getElementById("authors_table");
            let modal_id = $(this).attr("id")+"Modal";

            let row = table.insertRow(-1);

            let author_id = row.insertCell(0);
            let author_name = row.insertCell(1);
            let remove_author = row.insertCell(2);

            if ($(this).attr("id") == "addExistingAuthor") {
                author_id.innerHTML = $("#select_existing_author").val().split("_")[0];
                author_name.innerHTML = $("#select_existing_author").val().split("_")[1];

                authors[countRows] =  $("#select_existing_author").val().split("_")[0];
            } else {
                author_name.innerHTML = $("#new_author_fullname").val();
                addNewAuthor();
            }

            remove_author.innerHTML = '<a type="button" class="btn btn-danger text-white w-100" id="remove_author_'+countRows+'" data-id="'+countRows+'">Ukloni autora</a>';
            countRows++;

            $('#'+modal_id).fadeOut();
            $('.modal-backdrop').fadeOut();

        });

        $(document).on('click', "[id^='remove_author_']", function(e) {
            $(this).parent().parent().remove();

            let row = $(this).attr("data-id");

            if (new_authors[row]!=null) delete new_authors[row];
            if (authors[row]!=null ) delete authors[row];
        });

        function addNewAuthor() {

            new_authors[countRows] = {};
            new_authors[countRows]["fullname"] = $("#new_author_fullname").val();
            new_authors[countRows]["title"] = $("#new_author_title").val();
            new_authors[countRows]["titula"] = $("#new_author_titula").val();

            $("#new_author_fullname").val("");
            $("#new_author_title").val("");
            $("#new_author_titula").val("");
        }

        $("#addPublicationForm").on('submit', function(e){
            e.preventDefault();

            let title = $("#title").val();
            let naziv = $("#naziv").val();
            let abstract = $("#abstract").val();
            let opis = $("#opis").val();
            let link = $("#link").val();
            let tip = $("#type_id").find(":selected").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                }
            });

            $.ajax({
                type: 'PUT',
                url: "{{ route('publications.update', $publication) }}",
                data: {
                    title: title,
                    naziv: naziv,
                    abstract: abstract,
                    opis: opis,
                    link: link,
                    type_id: tip,
                    authors: authors,
                    new_authors: new_authors,
                },
                success:function(response) {
                    if (response.success) {
                        $(".is-invalid").removeClass('is-invalid');
                        $(".invalid-feedback").addClass('d-none');
                        $(".response-message").html(response.message);
                        $(".response-div").removeClass("d-none");

                        setTimeout(function() {
                            location.reload();
                        }, 1000)

                    }
                },
                error:function(xhr, status, error) {
                    // Inspect the validation errors
                    var responseJson = JSON.parse(xhr.responseText);
                    var errors = responseJson.errors;

                    // reset if there were old errors
                    $(".is-invalid").removeClass('is-invalid');
                    $(".invalid-feedback").addClass('d-none');

                    for (const [key,  value] of  Object.entries(errors)) {
                        $("#"+key).addClass('is-invalid');
                        $("#error-"+key).removeClass('d-none');
                        $("#error-message-"+key).html(value);
                    }
                }
            });
        });

    </script>
@endsection
