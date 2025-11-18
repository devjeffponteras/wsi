<div class="row">
  <div class="col-md-8" id="containment">
    <img id="resize" src="{{ $img->url . '?timestamp=' . $img->updated }}" height="{{ $height }}" width="{{ $width }}">
  </div>
  <div class="col-md-4">

    <table class="table table-compact table-striped">
      <thead></thead>
      <tbody>
        @if ($scaled)
        <tr>
          <td>{{ trans('laravel-filemanager::lfm.resize-ratio') }}</td>
          <td>{{ number_format($ratio, 2) }}</td>
        </tr>
        <tr>
          <td>{{ trans('laravel-filemanager::lfm.resize-scaled') }}</td>
          <td>
            {{ trans('laravel-filemanager::lfm.resize-true') }}
          </td>
        </tr>
        @endif
        <tr>
          <td>{{ trans('laravel-filemanager::lfm.resize-old-height') }}</td>
          <td>{{ $original_height }}px</td>
        </tr>
        <tr>
          <td>{{ trans('laravel-filemanager::lfm.resize-old-width') }}</td>
          <td>{{ $original_width }}px</td>
        </tr>
        <tr>
          <td>{{ trans('laravel-filemanager::lfm.resize-new-height') }}</td>
          <td>
            <input type="number" id="height_input" value="{{ $height }}" min="1" style="width:70px;display:inline-block;">
            <span id="height_display" style="margin-left:6px;"></span>
          </td>
        </tr>
        <tr>
          <td>{{ trans('laravel-filemanager::lfm.resize-new-width') }}</td>
          <td>
            <input type="number" id="width_input" value="{{ $width }}" min="1" style="width:70px;display:inline-block;">
            <span id="width_display" style="margin-left:6px;"></span>
          </td>
        </tr>
      </tbody>
    </table>

    <button class="btn btn-primary" onclick="doResize()">{{ trans('laravel-filemanager::lfm.btn-resize') }}</button>
    <button class="btn btn-secondary" onclick="resetResize()" style="margin-left:8px;">Reset Size</button>
    <button class="btn btn-info" onclick="loadItems()">{{ trans('laravel-filemanager::lfm.btn-cancel') }}</button>

    <input type="hidden" id="img" name="img" value="{{ $img->name }}">
    <input type="hidden" name="ratio" value="{{ $ratio }}"><br>
    <input type="hidden" name="scaled" value="{{ $scaled }}"><br>
    <input type="hidden" id="original_height" name="original_height" value="{{ $original_height }}"><br>
    <input type="hidden" id="original_width" name="original_width" value="{{ $original_width }}"><br>
    <input type="hidden" id="height" name="height" value="{{ $height }}"><br>
    <input type="hidden" id="width" name="width" value="{{ $width }}">

  </div>
</div>

<script>
  $(document).ready(function () {
    function updateInputsFromImage() {
      $("#height_input").val($("#resize").height());
      $("#width_input").val($("#resize").width());
      $("#height_display").html($("#resize").height() + "px");
      $("#width_display").html($("#resize").width() + "px");
      $("#height").val($("#resize").height());
      $("#width").val($("#resize").width());
    }
    function updateImageFromInputs() {
      var h = parseInt($("#height_input").val(), 10);
      var w = parseInt($("#width_input").val(), 10);
      if (h > 0 && w > 0) {
        $("#resize").height(h);
        $("#resize").width(w);
        $("#height").val(h);
        $("#width").val(w);
        $("#height_display").html(h + "px");
        $("#width_display").html(w + "px");
      }
    }
    updateInputsFromImage();
    var originalWidth = parseInt($("#original_width").val(), 10);
    var originalHeight = parseInt($("#original_height").val(), 10);
    $("#resize").resizable({
      aspectRatio: true, // keep proportional resizing
      containment: false, // allow resizing beyond container
      handles: "n, e, s, w, se, sw, ne, nw", // all handles
      minWidth: 50,
      minHeight: 50,
      maxWidth: originalWidth * 3,
      maxHeight: originalHeight * 3,
      resize: function (event, ui) {
        updateInputsFromImage();
      },
      stop: function(event, ui) {
        // Store the current size as the new 'current' size
        $("#resize").data("current-width", $("#resize").width());
        $("#resize").data("current-height", $("#resize").height());
      }
    });
    // Store the original size on load
    $("#resize").data("original-width", $("#original_width").val());
    $("#resize").data("original-height", $("#original_height").val());
    $("#resize").data("current-width", $("#resize").width());
    $("#resize").data("current-height", $("#resize").height());
    $("#height_input, #width_input").on("change keyup", function () {
      updateImageFromInputs();
    });
  });

  function doResize() {
    performLfmRequest('doresize', {
      img: $("#img").val(),
      dataX: $("#dataX").val(),
      dataY: $("#dataY").val(),
      dataHeight: $("#height").val(),
      dataWidth: $("#width").val()
    }).done(loadItems);
  }

  function resetResize() {
    var originalWidth = parseInt($("#resize").data("original-width"), 10);
    var originalHeight = parseInt($("#resize").data("original-height"), 10);
    $("#resize").width(originalWidth);
    $("#resize").height(originalHeight);
    $("#width").val(originalWidth);
    $("#height").val(originalHeight);
    $("#width_input").val(originalWidth);
    $("#height_input").val(originalHeight);
    $("#width_display").html(originalWidth + "px");
    $("#height_display").html(originalHeight + "px");
    // Also update the current size data
    $("#resize").data("current-width", originalWidth);
    $("#resize").data("current-height", originalHeight);
  }
</script>
