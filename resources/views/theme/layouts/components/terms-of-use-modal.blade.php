<!-- Terms of Use Modal -->
<div id="termsModal" class="privacy-modal">
    <div class="privacy-modal-content">
        <span class="privacy-modal-close" id="termsModalClose">&times;</span>
        <h2>Terms of Use</h2>

        <h3>Acceptance of Terms</h3>
        <p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.</p>

        <h3>Website Usage</h3>
        <ul>
            <li>You may use our website for lawful purposes only</li>
            <li>You agree not to use the website in any way that violates applicable laws</li>
            <li>You are responsible for maintaining the confidentiality of your account</li>
        </ul>

        <h3>Intellectual Property</h3>
        <p>The content, organization, graphics, design, and other matters related to this website are protected under applicable copyrights and other proprietary laws.</p>

        <h3>Disclaimer</h3>
        <p>The information on this website is provided on an "as is" basis. We disclaim all warranties, express or implied, including warranties of merchantability and fitness for a particular purpose.</p>

        <h3>Limitation of Liability</h3>
        <p>In no event shall we be liable for any direct, indirect, punitive, incidental, special, or consequential damages arising out of your use of this website.</p>

        <h3>Modifications</h3>
        <p>We reserve the right to modify these terms at any time. Your continued use of the website following any changes indicates your acceptance of the new terms.</p>

        <p><em>Last updated: {{ date('F j, Y') }}</em></p>

        <div class="privacy-checkbox-container">
            <div class="privacy-checkbox">
                <input type="checkbox" id="termsAcceptCheck" name="termsAcceptCheck">
                <label for="termsAcceptCheck">I have read and agree to the Terms of Use</label>
            </div>
            <button type="button" class="modal-accept-button" id="termsAcceptButton" disabled>Accept Terms of Use</button>
        </div>
    </div>
</div>
