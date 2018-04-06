@extends ('layouts.master')
<!-- View for the create_entry page -->
@section('content')


@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <form class="typeahead" role="search">
                        <div class="form-group">
                          <input type="search" name="q" class="form-control" placeholder="Search" autocomplete="off">
                        </div>
                      </form>
                      <!-- jQuery (necessary for Bootstrap's JavaScript plugins and Typeahead) -->
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                      <!-- Bootstrap JS -->
                      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                      <!-- Typeahead.js Bundle -->
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

<script>
                      jQuery(document).ready(function($) {
                          // Set the Options for "Bloodhound" suggestion engine
                          var engine = new Bloodhound({
                              remote: {
                                  url: '/find?q=%QUERY%',
                                  wildcard: '%QUERY%'
                              },
                              datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                              queryTokenizer: Bloodhound.tokenizers.whitespace
                          });

                          $(".search-input").typeahead({
                              hint: true,
                              highlight: true,
                              minLength: 1
                          }, {
                              source: engine.ttAdapter(),

                              // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                              name: 'usersList',

                              // the key from the array we want to display (name,id,email,etc...)
                              templates: {
                                  empty: [
                                      '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                                  ],
                                  header: [
                                      '<div class="list-group search-results-dropdown">'
                                  ],
                                  suggestion: function (data) {
                                      return '<a href="' + data.profile.username + '" class="list-group-item">' + data.name + '- @' + data.profile.username + '</a>'
                            }
                              }
                          });
                      });


</script>


<br><br><br>


<input type="text" value="Amsterdam,Washington" data-role="tagsinput" />
</div></div></div></div></div>


<script>
var citynames = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: {
    url: 'assets/citynames.json',
    filter: function(list) {
      return $.map(list, function(cityname) {
        return { name: cityname }; });
    }
  }
});
citynames.initialize();

$('input').tagsinput({
  typeaheadjs: {
    name: 'citynames',
    displayKey: 'name',
    valueKey: 'name',
    source: citynames.ttAdapter()
  }
});
</script>
@endsection
