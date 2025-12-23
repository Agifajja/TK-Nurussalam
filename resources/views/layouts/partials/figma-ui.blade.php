<style>
/* =========================
   FIGMA DESIGN SYSTEM
========================= */
:root {
    --fig-bg: #ffffff;
    --fig-green: #cfe8c3;
    --fig-green-soft: #D8F1CD;
    --fig-text: #2e2e2e;

    --radius-xl: 20px;
    --radius-lg: 14px;
    --radius-md: 10px;

    --fs-title: 16px;
    --fs-body: 14px;
    --fs-small: 13px;
}

/* =========================
   PAGE
========================= */
.figma-page {
    padding: 24px;
    font-family: 'Poppins', sans-serif;
}

/* =========================
   CARD
========================= */
.figma-card {
    background: white;
    border-radius: var(--radius-xl);
    padding: 16px;
    width: 100%;
}

/* HEADER */
.figma-card-header {
    background: var(--fig-green);
    padding: 14px 20px;
    border-radius: var(--radius-lg);
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: var(--fs-title);
    font-weight: 600;
}

/* BODY */
.figma-card-body {
    background: white;
    border-radius: var(--radius-lg);
    padding: 22px;
    margin-top: 14px;
}

/* =========================
   BUTTON
========================= */
.figma-btn-add {
    background: #e6f2de;
    padding: 8px 16px;
    border-radius: var(--radius-md);
    font-size: var(--fs-small);
    font-weight: 600;
    color: var(--fig-text);
    text-decoration: none;
}

/* =========================
   TABLE
========================= */
.figma-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 12px;
}

.figma-table th {
    font-size: var(--fs-small);
    font-weight: 600;
    padding: 6px 10px;
    text-align: left;
}

.figma-table tbody tr {
    background: var(--fig-green-soft);
}

.figma-table td {
    padding: 14px;
    font-size: var(--fs-body);
}

.figma-table tbody tr td:first-child {
    border-radius: var(--radius-md) 0 0 var(--radius-md);
}

.figma-table tbody tr td:last-child {
    border-radius: 0 var(--radius-md) var(--radius-md) 0;
}

/* =========================
   AKSI
========================= */
.aksi-cell {
    display: flex;
    gap: 10px;
}

.aksi-btn {
    width: 32px;
    height: 32px;
    background: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

/* =========================
   FORM
========================= */
.figma-form-row {
    display: flex;
    flex-direction: column;
    margin-bottom: 18px;
}

.figma-form-row label {
    font-size: var(--fs-small);
    font-weight: 500;
    margin-bottom: 4px;
}

.figma-form-row input,
.figma-form-row textarea {
    border: none;
    border-bottom: 2px solid #333;
    padding: 6px 0;
    font-size: var(--fs-body);
    background: transparent;
}

.figma-form-row input:focus,
.figma-form-row textarea:focus {
    outline: none;
    border-bottom-color: #375B45;
}

.figma-action {
    display: flex;
    justify-content: flex-end;
    margin-top: 24px;
}

.figma-btn-save {
    background: #375B45;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 8px 22px;
    font-size: var(--fs-body);
}
/* =========================
   DASHBOARD TABLE FIX
========================= */
.table-card {
    background: #ffffff;
    border-radius: 22px;
    padding: 24px;
}

.table-card h5 {
    font-weight: 800;
    margin-bottom: 18px;
}

.table-card table {
    width: 100%;
    border-collapse: collapse;
}

.table-card thead th {
    background: #D8F1CD;
    padding: 14px;
    font-weight: 700;
    text-align: left;
    border-bottom: 2px solid #c4e5b7;
}

.table-card tbody tr {
    border-bottom: 1px solid #e2e2e2;
}

.table-card tbody td {
    padding: 14px;
    font-weight: 500;
}

</style>
