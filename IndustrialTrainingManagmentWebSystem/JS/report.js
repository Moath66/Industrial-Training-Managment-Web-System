// Report page functionality

// Function to view the sorted report
function viewReport() {
  // Retrieve the sorted report from the database
  // Perform necessary database operations and retrieve the sorted data
  
  // Display the sorted report on the page
  const sortedReport = {
    // Sample sorted report data
    coordinatorName: "Jane Smith",
    students: [
      { name: "John Doe", organization: "ABC Company" },
      { name: "Jane Doe", organization: "XYZ Corporation" },
      { name: "Bob Smith", organization: "123 Enterprises" }
    ]
  };

  const reportContainer = document.getElementById("reportContainer");
  reportContainer.innerHTML = `
    <h3>Sorted Report</h3>
    <p><strong>Coordinator Name:</strong> ${sortedReport.coordinatorName}</p>
    <h4>Students:</h4>
    <ul>
      ${sortedReport.students
        .map(student => `<li>${student.name} - ${student.organization}</li>`)
        .join("")}
    </ul>
  `;
}

// Add event listeners to buttons or elements as needed

document.getElementById("viewReportBtn").addEventListener("click", viewReport);
/***********************************************Styling****************************************************************************************************/
