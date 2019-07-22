function setCourse() {

    var id = document.getElementById("old_id").value;

    var course = 'courseId'+id;
    var name = 'name'+id;
    var enrollment = 'enrollment'+id;
    var year = 'year'+id;
    var semester = 'semester'+id;

    document.getElementById("edit_id").value = document.getElementById(course).value;
    document.getElementById("edit_course").value = document.getElementById(name).value;
    document.getElementById("edit_enrollment").value = document.getElementById(enrollment).value;
    document.getElementById("edit_year").value = document.getElementById(year).value;
    document.getElementById("edit_semester").value = document.getElementById(semester).value;
    document.getElementById("old_course").value = document.getElementById(course).value;

}

function edit_Course(form) {

    var course = document.getElementById("edit_course").value;

    re = /^[0-9a-zA-Z]+$/;
    if(!re.test(course)) {
        showErrorMsg("Your Entered Wrong Input, You Can be Used Only Numbers And Characters !");
        return false;
    }

    return confirmEditCourse(form);

}

function confirmEditCourse(form) {

    swal({
        title: "Are You Sure?",
        text: "If You Want Edit This !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    return false;

}

function setDeleteCourse() {

    var id = document.getElementById("deleteId").value;

    var course = 'courseId'+id;
    var name = 'name'+id;
    var enrollment = 'enrollment'+id;
    var year = 'year'+id;
    var semester = 'semester'+id;

    document.getElementById("delete_id").value = document.getElementById(course).value;
    document.getElementById("delete_course").value = document.getElementById(name).value;
    document.getElementById("delete_enrollment").value = document.getElementById(enrollment).value;
    document.getElementById("delete_year").value = document.getElementById(year).value;
    document.getElementById("delete_semester").value = document.getElementById(semester).value;

}

function delete_Course(form) {

    swal({
        title: "Are You Sure?",
        text: "If You Want Delete This !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    return false;

}

function delete_Notice_Check() {

    if (document.getElementById("notice_id").value==""){
        return false;
        showErrorMsg("Please Select Notice!");
    }else {
        swal({
            title: "Are You Sure?",
            text: "If You Want Delete This !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        return false;
    }

}

function courseworkClick(ids) {

    var id =ids.id;

    document.getElementById("courseworkId").value = id;

    document.getElementById("courseworkIds").submit();

}

function courseMaterial(form) {

    var file = $('#upload_File').val();

    if( file=='' ){
        showErrorMsg("Please Upload File !");
        return false;
    }

    return uploadFileCheck(form);
}

function uploadFileCheck(form) {

    var fup = document.getElementById('upload_File');
    var fileName = fup.value;
    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
    if(ext == "pdf" || ext == "ppt" || ext == "doc" || ext == "docx" || ext == "txt")
    {
        return true;
    }else {
        showErrorMsg("You Can Upload PDF,PPT,DOC,TXT or DOCX File Only !")
    }

    return false;

}

function setCourseMaterial() {

    var id = document.getElementById("old_id").value;

    var type = 'editType'+id;
    var description = 'editDescription'+id;
    var fileName = 'editFileName'+id;
    var file = 'file'+id;
    var filePath = 'filePath'+id;
    var week = 'editWeek'+id;
    var file_Path = 'file_Path'+id;

    document.getElementById("editType").value = document.getElementById(type).value;
    document.getElementById("editDescription").value = document.getElementById(description).value;
    document.getElementById("editFileName").value = document.getElementById(fileName).value;
    document.getElementById("filePath").value = document.getElementById(file).value;
    document.getElementById("editUrl").value = document.getElementById(filePath).value;
    document.getElementById("editWeek").value = document.getElementById(week).value;
    document.getElementById("file_Path").value = document.getElementById(file_Path).value;

}

function uploadEditFileCheck(form) {

    var fup = document.getElementById('upload_File_Change');
    var fileName = fup.value;
    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
    if(ext == "" || ext == "pdf" || ext == "ppt" || ext == "doc" || ext == "docx" || ext == "txt")
    {
        return confirmEditCourse(form);
    }else {
        showErrorMsg("You Can Upload PDF,PPT,DOC,TXT or DOCX File Only !")
    }

    return false;

}


function setRemoveMaterial() {

    var id = document.getElementById("remove_id").value;

    var type = 'editType'+id;
    var description = 'editDescription'+id;
    var fileName = 'editFileName'+id;
    var file = 'file'+id;
    var filePath = 'filePath'+id;
    var week = 'editWeek'+id;

    document.getElementById("removeType").value = document.getElementById(type).value;
    document.getElementById("removeDescription").value = document.getElementById(description).value;
    document.getElementById("removeFileName").value = document.getElementById(fileName).value;
    document.getElementById("removeFilePath").value = document.getElementById(file).value;
    document.getElementById("removeUrl").value = document.getElementById(filePath).value;
    document.getElementById("removeWeek").value = document.getElementById(week).value;

}

function setAssignment() {

    var id = document.getElementById("assignment_id").value;

    var week = 'assignmentWeek'+id;
    var date = 'submitDate'+id;
    var description = 'assignmentDescription'+id;
    var fileUrl = 'assignmentFileUrl'+id;
    var fileName = 'assignmentFileName'+id;
    var name = 'assignmentName'+id;
    var documentUrl = 'assignment_File_Path'+id;

    document.getElementById("assignmentWeek").value = document.getElementById(week).value;
    document.getElementById("submitDate").value = document.getElementById(date).value;
    document.getElementById("assignmentDescription").value = document.getElementById(description).value;
    document.getElementById("editAssignmentDocument").value = document.getElementById(fileName).value;
    document.getElementById("assignmentName").value = document.getElementById(name).value;
    document.getElementById("assignmentFileUrl").value = document.getElementById(fileUrl).value;
    document.getElementById("assignment_File_Path").value = document.getElementById(documentUrl).value;

}

function setRemoveAssignment() {

    var id = document.getElementById("assignmentRemove_id").value;

    var week = 'assignmentWeek'+id;
    var date = 'submitDate'+id;
    var description = 'assignmentDescription'+id;
    var fileUrl = 'assignmentFileUrl'+id;
    var fileName = 'assignmentFileName'+id;
    var name = 'assignmentName'+id;

    document.getElementById("assignmentWeekRemove").value = document.getElementById(week).value;
    document.getElementById("submitDateRemove").value = document.getElementById(date).value;
    document.getElementById("assignmentDescriptionRemove").value = document.getElementById(description).value;
    document.getElementById("editAssignmentDocumentRemove").value = document.getElementById(fileName).value;
    document.getElementById("assignmentNameRemove").value = document.getElementById(name).value;
    document.getElementById("assignmentFileUrlRemove").value = document.getElementById(fileUrl).value;

}

function setNoticeDetails() {

    var id = document.getElementById("notice_id").value;

    var note = 'noticeNote'+id;
    var noteId = 'noticeId'+id;

    document.getElementById("noticeNote").value = document.getElementById(note).value;
    document.getElementById("removeNoticeId").value = document.getElementById(noteId).value;

}

function submissionAssignment(form) {

    var file = $('#upload_File').val();

    if( file=='' ){
        showErrorMsg("Please Upload File !");
        return false;
    }

    return uploadAssignmentFileCheck(form);
}

function uploadAssignmentFileCheck(form) {

    var fup = document.getElementById('upload_File');
    var fileName = fup.value;
    var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
    if(ext == "pdf" || ext == "ppt" || ext == "doc" || ext == "docx" || ext == "txt")
    {
        return confirmAssignmentCheck(form);
    }else {
        showErrorMsg("You Can Upload PDF,PPT,DOC,TXT or DOCX File Only !")
    }

    return false;

}

function confirmAssignmentCheck(form) {
    swal({
        title: "Are You Sure?",
        text: "If You Want Submit This Assignment !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    return false;
}