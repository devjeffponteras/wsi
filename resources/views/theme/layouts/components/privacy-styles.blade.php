<!-- Privacy and Cookie Policy Banner Styles -->
<style>
@keyframes slideIn {
    from {
        bottom: -100px;
        opacity: 0;
    }
    to {
        bottom: 0;
        opacity: 1;
    }
}
.privacy-banner {
    animation: slideIn 0.5s ease-in-out forwards;
}

/* Go to Top button positioning - ensure it appears above privacy banner */
#gotoTop {
    z-index: 1001 !important;
}

/* Privacy Modal Styles */
.privacy-modal {
    display: none;
    position: fixed;
    z-index: 2000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.privacy-modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 30px;
    border: none;
    width: 90%;
    max-width: 800px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.3);
    position: relative;
    max-height: 80vh;
    overflow-y: auto;
}

.privacy-modal-close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    right: 20px;
    top: 15px;
    cursor: pointer;
}

.privacy-modal-close:hover,
.privacy-modal-close:focus {
    color: #000;
    text-decoration: none;
}

.privacy-modal h2 {
    color: #333;
    margin-bottom: 20px;
    font-size: 24px;
}

.privacy-modal h3 {
    color: #555;
    margin: 20px 0 10px 0;
    font-size: 18px;
}

.privacy-modal p {
    line-height: 1.6;
    margin-bottom: 15px;
    color: #666;
}

.privacy-modal ul {
    margin: 10px 0;
    padding-left: 20px;
}

.privacy-modal li {
    margin-bottom: 5px;
    color: #666;
}

/* Checkbox styles */
.privacy-checkbox-container {
    margin: 25px 0;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    border-left: 4px solid #4CCD99;
}

.privacy-checkbox {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

.privacy-checkbox input[type="checkbox"] {
    margin-right: 10px;
    transform: scale(1.2);
    cursor: pointer;
}

.privacy-checkbox label {
    cursor: pointer;
    color: #333;
    font-weight: 500;
}

.modal-accept-button {
    background-color: #4CCD99;
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    transition: background-color 0.3s;
}

.modal-accept-button:hover {
    background-color: #3bb386;
}

.modal-accept-button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

/* Tab Styles */
.tab-navigation {
    margin-bottom: 20px;
    border-bottom: 2px solid #e0e0e0;
    display: flex;
}

.tab-button {
    background: none;
    border: none;
    padding: 12px 24px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 500;
    color: #666;
    border-bottom: 3px solid transparent;
    transition: all 0.3s ease;
}

.tab-button.active {
    color: #4CCD99;
    border-bottom-color: #4CCD99;
}

.tab-button:hover {
    color: #4CCD99;
    background-color: #f8f9fa;
}

.tab-content {
    display: none;
    padding: 20px 0;
}

.tab-content.active {
    display: block;
}
</style>
