<style>
/**
 * Variables
 */
/**
 * General Styles
 */
/* line 17, ../../sass/admin/screen.scss */
body {
  padding-top: 80px;
}

/* line 20, ../../sass/admin/screen.scss */
h2 {
  margin-top: 0;
}

/* line 23, ../../sass/admin/screen.scss */
textarea {
  resize: vertical;
}

/* line 26, ../../sass/admin/screen.scss */
hr {
  color: #d9d9d9;
  background-color: #d9d9d9;
  margin: 0 0 10px;
  border-bottom: 1px solid #d9d9d9;
  border-top: 0;
}

/* line 33, ../../sass/admin/screen.scss */
#spinner {
  width: 28px;
  height: 27.5px;
  margin-top: 6px;
  margin-right: 20px;
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}
/* line 40, ../../sass/admin/screen.scss */
#spinner.busy {
  opacity: 0.5;
}
@media screen and (max-width: 1200px) {
  /* line 33, ../../sass/admin/screen.scss */
  #spinner {
    display: none;
  }
}

/* line 47, ../../sass/admin/screen.scss */
div[image-upload] > img {
  margin: 20px 0 0;
  width: 100%;
}

/* line 51, ../../sass/admin/screen.scss */
.btn-group {
  z-index: 200;
}

/* line 54, ../../sass/admin/screen.scss */
.edit-header {
  line-height: 35px;
  font-weight: normal;
}
/* line 57, ../../sass/admin/screen.scss */
.edit-header .title {
  font-weight: bold;
}
/* line 59, ../../sass/admin/screen.scss */
.edit-header .title.untitled {
  color: #cccccc;
  font-weight: normal;
}

/* line 65, ../../sass/admin/screen.scss */
.edit-field {
  margin-bottom: 10px;
}
/* line 67, ../../sass/admin/screen.scss */
.edit-field.border-bottom {
  padding-bottom: 10px;
  border-bottom: 1px solid #d9d9d9;
}
/* line 71, ../../sass/admin/screen.scss */
.edit-field > label {
  font-weight: bold;
}
/* line 75, ../../sass/admin/screen.scss */
.edit-field > textarea,
.edit-field > input[type=text] {
  width: 100%;
  height: auto;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
/* line 80, ../../sass/admin/screen.scss */
.edit-field > label.pull-left {
  margin-right: 10px;
}
/* line 83, ../../sass/admin/screen.scss */
.edit-field > input[type=checkbox] {
  margin: 0;
}
/* line 86, ../../sass/admin/screen.scss */
.edit-field .chzn-container {
  width: 100% !important;
}
/* line 88, ../../sass/admin/screen.scss */
.edit-field .chzn-container ul.chzn-choices li.search-field input {
  height: 21px;
}
/* line 92, ../../sass/admin/screen.scss */
.edit-field .chzn-single {
  padding: 5px 11px;
  height: 34px;
}
/* line 95, ../../sass/admin/screen.scss */
.edit-field .chzn-single div {
  top: 5px;
  right: 5px;
}

/* line 101, ../../sass/admin/screen.scss */
.edit-field .chzn-container-multi .chzn-choices {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
}
/* line 103, ../../sass/admin/screen.scss */
.edit-field .chzn-container-multi .chzn-choices .search-field {
  height: 32px;
}
/* line 105, ../../sass/admin/screen.scss */
.edit-field .chzn-container-multi .chzn-choices .search-field input[type=text] {
  height: 32px;
  padding: 0 12px;
}
/* line 110, ../../sass/admin/screen.scss */
.edit-field .chzn-container-multi .chzn-choices .search-choice {
  margin-top: 5px;
}

/* line 114, ../../sass/admin/screen.scss */
.sidebar {
  width: 270px;
}
/* line 116, ../../sass/admin/screen.scss */
.sidebar .btn {
  text-align: left;
  padding: 10px;
}
/* line 119, ../../sass/admin/screen.scss */
.sidebar .btn span {
  vertical-align: middle;
  margin-top: 2px;
  right: 10px;
  float: right;
}

@media screen and (max-width: 1200px) {
  /* line 127, ../../sass/admin/screen.scss */
  .sidebar-container {
    display: none !important;
  }
}

@media screen and (max-width: 1200px) {
  /* line 132, ../../sass/admin/screen.scss */
  .col-lg-9 {
    width: 100%;
  }
}

/* line 137, ../../sass/admin/screen.scss */
.navbar-text {
  font-size: 0.875em;
}

/* line 140, ../../sass/admin/screen.scss */
.well {
  margin-bottom: 0;
}

/* line 143, ../../sass/admin/screen.scss */
.img-cell-white {
  background-color: white !important;
  vertical-align: middle !important;
}

/* line 147, ../../sass/admin/screen.scss */
.img-cell-gray {
  background-color: #1b1e20 !important;
  vertical-align: middle !important;
}

/* line 151, ../../sass/admin/screen.scss */
.contrast-group button {
  text-transform: capitalize;
  padding: 4px 20px;
}

/**
 * Helper Classes
 */
/* line 159, ../../sass/admin/screen.scss */
.clearfix {
  overflow: hidden;
}

/* line 162, ../../sass/admin/screen.scss */
.full-width {
  width: 100%;
}

/* line 165, ../../sass/admin/screen.scss */
.fuzz-section {
  margin-bottom: 60px;
}

/* line 168, ../../sass/admin/screen.scss */
.capitalize {
  text-transform: capitalize;
}

/* line 171, ../../sass/admin/screen.scss */
.centered {
  margin: 0 auto 10px;
  float: none;
}

/* line 175, ../../sass/admin/screen.scss */
.margin-top {
  margin-top: 10px;
}

/* line 178, ../../sass/admin/screen.scss */
.margin-bottom {
  margin-bottom: 10px;
}

/* line 181, ../../sass/admin/screen.scss */
.flat-top {
  margin-top: 0;
}

/* line 184, ../../sass/admin/screen.scss */
.flat-bottom {
  margin-bottom: 0 !important;
}

/* line 187, ../../sass/admin/screen.scss */
p.disabled {
  color: #cccccc;
}

/* line 190, ../../sass/admin/screen.scss */
.input-append {
  margin-bottom: 0;
}

/* line 193, ../../sass/admin/screen.scss */
.border-bottom {
  padding-bottom: 10px;
  border-bottom: 1px solid #d9d9d9;
}

/**
 * Tables
 */
/* line 202, ../../sass/admin/screen.scss */
.table thead th {
  vertical-align: middle;
}
/* line 204, ../../sass/admin/screen.scss */
.table thead th.th-filter {
  line-height: 28px;
}

/* line 209, ../../sass/admin/screen.scss */
td > input[type=text] {
  margin-bottom: 0;
}

/* line 212, ../../sass/admin/screen.scss */
th .edit-header {
  line-height: 1;
}

/**
 * Case Studies
 */
/* line 220, ../../sass/admin/screen.scss */
#case-study-form .banner-upload-well {
  min-height: 360px;
}

/* line 224, ../../sass/admin/screen.scss */
.case-studies .table td {
  vertical-align: middle;
}

/* line 227, ../../sass/admin/screen.scss */
.platform-link {
  margin-top: 5px;
}

/**
 * Generic form styling.
 */
/* line 237, ../../sass/admin/screen.scss */
#data-wrapper .acclaim-row .well,
#data-wrapper .column-row .well {
  margin-bottom: 10px;
  min-height: 0;
}
/* line 241, ../../sass/admin/screen.scss */
#data-wrapper .acclaim-row label,
#data-wrapper .column-row label {
  font-weight: normal;
}
/* line 245, ../../sass/admin/screen.scss */
#data-wrapper .acclaim-row input,
#data-wrapper .acclaim-row textarea,
#data-wrapper .column-row input,
#data-wrapper .column-row textarea {
  width: 100%;
  margin: 0 0 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
/* line 250, ../../sass/admin/screen.scss */
#data-wrapper .acclaim-row textarea,
#data-wrapper .column-row textarea {
  min-height: 100px;
}
/* line 255, ../../sass/admin/screen.scss */
#data-wrapper .well-options-container .sorter-handle {
  line-height: 19px;
}
/* line 257, ../../sass/admin/screen.scss */
#data-wrapper .well-options-container .sorter-handle .glyphicon-move {
  margin-left: 10px;
}

/**
 * Posts
 */
/* line 266, ../../sass/admin/screen.scss */
.filter-results-container {
  float: right;
}
/* line 268, ../../sass/admin/screen.scss */
.filter-results-container input[type=text] {
  margin-left: 10px;
  margin-bottom: 0;
}

/* line 273, ../../sass/admin/screen.scss */
.vertical-link {
  line-height: 34px;
}

/**
 * Taxonomies
 */
/* line 280, ../../sass/admin/screen.scss */
.platform-row div[image-upload] > img {
  width: 64px;
  height: auto;
  margin-top: 10px;
}

/* line 285, ../../sass/admin/screen.scss */
div[name=devices] .platform-row div[image-upload] > img {
  width: auto;
  height: 48px;
  margin-top: 0;
}

/**
 * Clients
 */
/* line 294, ../../sass/admin/screen.scss */
.client-row {
  height: 100px;
  max-height: 100px;
}
/* line 297, ../../sass/admin/screen.scss */
.client-row td {
  vertical-align: middle !important;
}
/* line 300, ../../sass/admin/screen.scss */
.client-row div[image-upload] > img {
  margin: 10px auto 0;
  width: 90px;
  height: auto;
  display: table-cell;
  vertical-align: middle;
}

/**
 * Jobs
 */
/* line 312, ../../sass/admin/screen.scss */
.row .job-app-row {
  margin: 0;
  border-bottom: 1px solid #ddd;
}
/* line 315, ../../sass/admin/screen.scss */
.row .job-app-row:first-child {
  margin-top: -10px;
}
/* line 318, ../../sass/admin/screen.scss */
.row .job-app-row:last-child {
  border: 0;
  margin-bottom: -10px;
}
/* line 322, ../../sass/admin/screen.scss */
.row .job-app-row [class^=col-] {
  margin: 10px 0;
}
/* line 324, ../../sass/admin/screen.scss */
.row .job-app-row [class^=col-]:first-child {
  padding: 0;
}
/* line 327, ../../sass/admin/screen.scss */
.row .job-app-row [class^=col-] p {
  margin: 0;
}

/* line 333, ../../sass/admin/screen.scss */
.job-options-row input[type=checkbox] {
  margin-right: 10px !important;
}
/* line 336, ../../sass/admin/screen.scss */
.job-options-row p {
  margin: 0;
}

/* line 340, ../../sass/admin/screen.scss */
.delete-link {
  padding-left: 0;
}

/**
 * People
 */
/* line 348, ../../sass/admin/screen.scss */
.employee-row .edit-field {
  margin-bottom: 0;
}
/* line 350, ../../sass/admin/screen.scss */
.employee-row .edit-field input {
  margin-bottom: 0;
}

/* line 355, ../../sass/admin/screen.scss */
.headshot div[image-upload] > img {
  margin-top: 10px;
}

/**
 * Services
 */
/* line 363, ../../sass/admin/screen.scss */
#services .well {
  margin-bottom: 10px;
}
/* line 365, ../../sass/admin/screen.scss */
#services .well.services-well {
  margin: 0 0 10px;
}
/* line 370, ../../sass/admin/screen.scss */
#services .testimonial .form-control {
  margin-bottom: 10px;
}
/* line 374, ../../sass/admin/screen.scss */
#services .icon-container {
  padding-top: 7px;
  padding-bottom: 3px;
}
/* line 379, ../../sass/admin/screen.scss */
#services .case-study-list li {
  text-align: left;
}
/* line 383, ../../sass/admin/screen.scss */
#services .services-icon {
  text-align: center;
}
/* line 385, ../../sass/admin/screen.scss */
#services .services-icon img {
  width: auto;
  height: auto;
  max-width: 147px;
  max-height: 147px;
}

/**
 * Footer Links
 */
/* line 397, ../../sass/admin/screen.scss */
.padding-sm {
  padding-bottom: 3px;
}

/**
 * Plugin Overrides
 */
/* line 404, ../../sass/admin/screen.scss */
#nottys {
  top: auto !important;
  bottom: 20px;
}

/* line 408, ../../sass/admin/screen.scss */
.sorter-handle {
  cursor: move;
}

/* line 411, ../../sass/admin/screen.scss */
.table .sorter-handle {
  position: relative;
}
/* line 413, ../../sass/admin/screen.scss */
.table .sorter-handle > .icon-move {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -7px;
  margin-left: -7px;
}

/* line 421, ../../sass/admin/screen.scss */
.ui-sortable-helper {
  z-index: 999;
}
/* line 423, ../../sass/admin/screen.scss */
.ui-sortable-helper > td {
  background: #00ca1d !important;
}

/* line 427, ../../sass/admin/screen.scss */
.sortable-placeholder {
  height: auto;
  background: red;
}

/* line 432, ../../sass/admin/screen.scss */
body #nottys .notty {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  background: #1b1e20;
  border: 1px solid #3e4549;
}
/* line 437, ../../sass/admin/screen.scss */
body #nottys .notty h2 {
  text-shadow: none;
}
/* line 440, ../../sass/admin/screen.scss */
body #nottys .notty .hide {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  text-shadow: none;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  -ms-border-radius: 0;
  -o-border-radius: 0;
  border-radius: 0;
  background: #3e4549;
  border: 0;
}
/* line 446, ../../sass/admin/screen.scss */
body #nottys .notty .hide:hover {
  color: white;
  background: #616c73;
}

/**
 * Widget wizard
 */
/* line 457, ../../sass/admin/screen.scss */
#widget-wizard {
  margin-bottom: 24px;
}
/* line 459, ../../sass/admin/screen.scss */
#widget-wizard img {
  opacity: 0.25;
}
/* line 461, ../../sass/admin/screen.scss */
#widget-wizard img:hover {
  cursor: pointer;
  opacity: 1;
}

/**
 * Markdown Editor
 */
/* line 471, ../../sass/admin/screen.scss */
.markdown-editor {
  min-height: 400px;
}

/* line 475, ../../sass/admin/screen.scss */
.widgets .widget {
  padding: 10px 0;
  margin-bottom: 10px;
}
/* line 478, ../../sass/admin/screen.scss */
.widgets .widget .edit-field {
  margin-bottom: 0;
}
/* line 482, ../../sass/admin/screen.scss */
.widgets .md-editor .md-header {
  padding-top: 0;
}
/* line 485, ../../sass/admin/screen.scss */
.widgets .markdown-editor {
  min-height: 0;
}

/* line 491, ../../sass/admin/screen.scss */
.md-editor textarea,
.md-editor .md-header {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 10px;
}
/* line 495, ../../sass/admin/screen.scss */
.md-editor .md-header {
  padding: 10px 0;
}

/* line 499, ../../sass/admin/screen.scss */
#markdown-modal:not(.in) {
  display: none;
}

/* line 502, ../../sass/admin/screen.scss */
.modal-button {
  position: absolute;
  right: 25px;
  top: 35px;
}
/* line 506, ../../sass/admin/screen.scss */
.modal-button.testimonial-example {
  right: 245px;
}

/* line 511, ../../sass/admin/screen.scss */
.markdown-instructions .span12 {
  width: 96.5%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
/* line 514, ../../sass/admin/screen.scss */
.markdown-instructions .span12 .well {
  padding: 10px;
  margin-bottom: 10px;
}
/* line 517, ../../sass/admin/screen.scss */
.markdown-instructions .span12 .well .result {
  color: #aaa;
  display: block;
}

/**
 * Media Queries
 */
@media screen and (max-width: 1200px) and (min-width: 768px) {
  /* line 529, ../../sass/admin/screen.scss */
  .navbar-nav li a {
    padding: 10px 9px;
    font-size: 85%;
    line-height: 35px;
  }
}
@media screen and (max-width: 1200px) {
  /* line 536, ../../sass/admin/screen.scss */
  .navbar-text {
    margin: 19px 0 0;
    padding-right: 0;
  }

  /* line 540, ../../sass/admin/screen.scss */
  .name {
    display: none;
  }

  /* line 543, ../../sass/admin/screen.scss */
  .row .job-app-row:first-child {
    display: none;
  }
}
@media screen and (max-width: 961px) {
  /* line 549, ../../sass/admin/screen.scss */
  .employee-row .edit-field input {
    margin-bottom: 10px;
  }

  /* line 552, ../../sass/admin/screen.scss */
  .row .job-app-row [class^=col-] {
    padding: 0;
  }

  /* line 555, ../../sass/admin/screen.scss */
  .delete-link {
    padding-left: 15px;
  }
}
@media screen and (max-width: 768px) {
  /* line 561, ../../sass/admin/screen.scss */
  .md-editor button[title=Preview] {
    display: none;
  }
}
</style>
<script type="application/javascript" src="/static/ckeditor/ckeditor.js"></script>
