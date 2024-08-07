import BpmnJS from "bpmn-js/dist/bpmn-modeler.production.min.js";
import $ from "jquery";

const diagramUrl =
    "https://cdn.statically.io/gh/bpmn-io/bpmn-js-examples/dfceecba/starter/diagram.bpmn";
// Create the modeler instance
const bpmnModeler = new BpmnJS({
    container: "#canvas",
    keyboard: {
        bindTo: window,
    },
});

/**
 * Export diagram to a file and trigger download.
 */
async function exportDiagram() {
    try {
        const result = await bpmnModeler.saveXML({ format: true });

        const blob = new Blob([result.xml], { type: "application/xml" });
        const url = URL.createObjectURL(blob);

        const link = document.createElement("a");
        link.href = url;
        link.download = "diagram.bpmn";

        document.body.appendChild(link);
        link.click();

        document.body.removeChild(link);
        URL.revokeObjectURL(url);

        alert("Diagram exported successfully!");
    } catch (err) {
        console.error("Could not save BPMN 2.0 diagram:", err);
    }
}

async function saveDiagram() {
    try {
        const result = await bpmnModeler.saveXML({ format: true });
        const projectId = $("#project-id").val();

        // Send the XML to your Laravel backend
        $.ajax({
            type: "POST",
            url: "/modeler/store", // Update this URL to your save endpoint
            data: {
                modeler: result.xml,
                project_id: projectId,
                _token: $('meta[name="csrf-token"]').attr("content"), // Include CSRF token if needed
            },
            success: function (response) {
                alert("Diagram saved successfully!");
            },
            error: function (xhr, status, error) {
                console.error("Could not save BPMN 2.0 diagram:", error);
                alert("An error occurred while saving the diagram.");
            },
        });
    } catch (err) {
        console.error("Could not save BPMN 2.0 diagram:", err);
    }
}

/**
 * Load and display a diagram in the modeler.
 *
 * @param {String} bpmnXML - BPMN XML string to display
 */
async function openDiagram(bpmnXML) {
    try {
        if (bpmnXML) {
            await bpmnModeler.importXML(bpmnXML);
            const canvas = bpmnModeler.get("canvas");
            canvas.zoom("fit-viewport");
        } else {
            console.warn("No diagram XML available to load.");
        }
    } catch (err) {
        console.error("Could not import BPMN 2.0 diagram:", err);
    }
}

function importDiagram(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const xml = e.target.result;
            openDiagram(xml);
        };
        reader.readAsText(file);
    } else {
        console.warn("No file selected for import.");
    }
}

// Get diagram XML from Blade template
const diagramXml =
    document.getElementById("diagram-data")?.getAttribute("data-xml") || "";

// Load the diagram if available
if (diagramXml) {
    openDiagram(diagramXml);
} else {
    // Load external diagram file if no XML is available
    $.get(diagramUrl, openDiagram, "text");
}

// Wire up the download button
$("#download-button").click(exportDiagram);
$("#save-button").click(saveDiagram);
$("#import-button").click(() => $("#file-input").click());
$("#file-input").change(importDiagram);
