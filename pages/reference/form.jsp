<%@include file="../header.jsp" %>

<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Inline forms</h4>
      <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p>
      <form class="form-inline">
        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe" name="">
        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane" name="">
        <div class="form-group">
            <label for="exampleFormControlSelect3">Small select</label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect3">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
        </div>
        <label class="sr-only" for="inlineFormInputGroupUsername2">Date</label>
        <input type="date" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="">
        <div class="form-check mx-sm-2">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" checked> Remember me </label>
        </div>
        <button type="submit" class="btn btn-gradient-primary mb-2">Submit</button>
      </form>
    </div>
  </div>
</div>
<%@include file="../footer.jsp" %>