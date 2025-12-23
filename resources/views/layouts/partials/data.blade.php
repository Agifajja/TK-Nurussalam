<style>
/* ===== PAGE ===== */
.page-wrapper {
    padding: 24px;
    width: 100%;
}

/* ===== CARD ===== */
.card-figma {
    background: white;
    border-radius: 20px;
    padding: 16px;
    width: 100%;
    max-width: 100%;
}

/* ===== HEADER ===== */
.card-header-figma {
    background: #cfe8c3;
    padding: 16px 20px;
    font-size: 15px;
    font-weight: 600;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 14px;
    margin-bottom: 16px;
}

.close-btn {
    text-decoration: none;
    font-size: 18px;
    color: #333;
}

/* ===== BODY ===== */
.card-body-figma {
    background: var(--card);
    border-radius: 14px;
    padding: 22px;
}

/* ===== FORM ===== */
.form-row {
    display: flex;
    flex-direction: column;
    margin-bottom: 18px;
}

.form-row label {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 6px;
}

/* === UNDERLINE INPUT (FIGMA STYLE) === */
.form-row input,
.form-row textarea {
    border: none;
    border-bottom: 2px solid #333;
    border-radius: 0;
    padding: 6px 2px;
    background: transparent;
    font-size: 14px;
    outline: none;
}

/* FOCUS */
.form-row input:focus,
.form-row textarea:focus {
    border-bottom: 2px solid var(--accent);
}

/* ===== ACTION ===== */
.card-action {
    display: flex;
    justify-content: flex-end;
    margin-top: 24px;
}

.btn-save {
    background: var(--accent);
    border: none;
    border-radius: 12px;
    padding: 10px 22px;
    color: white;
    font-size: 14px;
    cursor: pointer;
}

/* ===== TABLE ===== */
.figma-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 12px;
}

.figma-table th {
    background: transparent;
    font-size: 13px;
    text-align: left;
    padding: 6px 10px;
}

.figma-table tbody tr {
    background: var(--card-soft);
}

.figma-table td {
    padding: 14px;
    font-size: 14px;
}

.figma-table tbody tr td:first-child {
    border-radius: 12px 0 0 12px;
}

.figma-table tbody tr td:last-child {
    border-radius: 0 12px 12px 0;
}

/* ===== AKSI ===== */
.aksi-cell {
    display: flex;
    gap: 8px;
    justify-content: center;
}

.aksi-btn {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: none;
    background: white;
    cursor: pointer;
}

/* ===== BUTTON ADD ===== */
.btn-add {
    background: var(--card-soft);
    padding: 8px 14px;
    border-radius: 10px;
    font-size: 13px;
    text-decoration: none;
    color: var(--text);
}

</style>
