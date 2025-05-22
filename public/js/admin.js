/**
 * Admin JavaScript file for Bengkel Mobil Beteng Betawi
 */

// DOM Ready
document.addEventListener('DOMContentLoaded', function() {
    // Toggle sidebar
    initSidebar();
    
    // Initialize tooltips and popovers
    initTooltipsAndPopovers();
    
    // Initialize dynamic form elements
    initDynamicForms();
});

/**
 * Initialize sidebar functionality
 */
function initSidebar() {
    const menuToggle = document.getElementById('menu-toggle');
    const wrapper = document.getElementById('wrapper');
    
    if (menuToggle && wrapper) {
        menuToggle.addEventListener('click', function() {
            wrapper.classList.toggle('toggled');
            
            // Save state to localStorage
            const isSidebarToggled = wrapper.classList.contains('toggled');
            localStorage.setItem('sidebarToggled', isSidebarToggled);
        });
        
        // Restore state from localStorage
        const isSidebarToggled = localStorage.getItem('sidebarToggled') === 'true';
        if (isSidebarToggled) {
            wrapper.classList.add('toggled');
        } else {
            wrapper.classList.remove('toggled');
        }
    }
}

/**
 * Initialize Bootstrap tooltips and popovers
 */
function initTooltipsAndPopovers() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Initialize popovers
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    const popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
}

/**
 * Initialize dynamic form elements
 */
function initDynamicForms() {
    // Image preview functionality
    const imageInputs = document.querySelectorAll('input[type="file"][accept*="image"]');
    
    imageInputs.forEach(input => {
        const previewId = input.getAttribute('data-preview') || 'imagePreview';
        const previewContainerId = input.getAttribute('data-preview-container') || 'imagePreviewContainer';
        
        const imagePreview = document.getElementById(previewId);
        const imagePreviewContainer = document.getElementById(previewContainerId);
        
        if (imagePreview && imagePreviewContainer) {
            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreviewContainer.classList.remove('d-none');
                    }
                    
                    reader.readAsDataURL(this.files[0]);
                } else {
                    imagePreviewContainer.classList.add('d-none');
                }
            });
        }
    });
    
    // Category selection handling
    const categorySelects = document.querySelectorAll('select[data-new-category]');
    
    categorySelects.forEach(select => {
        const newCategoryGroupId = select.getAttribute('data-new-category-group') || 'newCategoryGroup';
        const newCategoryInputId = select.getAttribute('data-new-category-input') || 'new_category';
        
        const newCategoryGroup = document.getElementById(newCategoryGroupId);
        const newCategoryInput = document.getElementById(newCategoryInputId);
        
        if (select && newCategoryGroup && newCategoryInput) {
            select.addEventListener('change', function() {
                if (this.value === 'new') {
                    newCategoryGroup.classList.remove('d-none');
                    newCategoryInput.setAttribute('required', '');
                } else {
                    newCategoryGroup.classList.add('d-none');
                    newCategoryInput.removeAttribute('required');
                }
            });
            
            // Initialize if 'new' is selected on page load
            if (select.value === 'new') {
                newCategoryGroup.classList.remove('d-none');
                newCategoryInput.setAttribute('required', '');
            }
        }
    });
    
    // Star rating visualization
    initStarRatings();
    
    // Auto-submit filters
    initAutoSubmitFilters();
    
    // Bulk actions
    initBulkActions();
}

/**
 * Initialize star ratings
 */
function initStarRatings() {
    const ratingInputs = document.querySelectorAll('input[name="rating"]');
    const starRatings = document.querySelectorAll('.star-rating');
    
    if (ratingInputs.length > 0 && starRatings.length > 0) {
        // Update stars based on selected rating
        function updateStars() {
            let selectedRating = 5; // Default
            
            ratingInputs.forEach(input => {
                if (input.checked) {
                    selectedRating = parseInt(input.value);
                }
            });
            
            starRatings.forEach((star, index) => {
                if (index < selectedRating) {
                    star.classList.remove('far');
                    star.classList.add('fas');
                } else {
                    star.classList.remove('fas');
                    star.classList.add('far');
                }
            });
        }
        
        // Initialize stars
        updateStars();
        
        // Add event listeners
        ratingInputs.forEach(input => {
            input.addEventListener('change', updateStars);
        });
        
        // Allow clicking on stars
        starRatings.forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                const ratingInput = document.getElementById('rating' + rating);
                
                if (ratingInput) {
                    ratingInput.checked = true;
                    updateStars();
                }
            });
        });
    }
}

/**
 * Initialize auto-submit filters
 */
function initAutoSubmitFilters() {
    const autoSubmitFilters = document.querySelectorAll('select[data-auto-submit="true"]');
    
    autoSubmitFilters.forEach(filter => {
        filter.addEventListener('change', function() {
            this.form.submit();
        });
    });
}

/**
 * Initialize bulk actions
 */
function initBulkActions() {
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.bulk-checkbox');
    const bulkActionForm = document.getElementById('bulkActionForm');
    const bulkActionBtns = document.querySelectorAll('[data-bulk-action]');
    
    if (selectAll && checkboxes.length > 0) {
        // Select all checkboxes
        selectAll.addEventListener('change', function() {
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    }
    
    if (bulkActionForm && bulkActionBtns.length > 0) {
        const bulkActionInput = document.getElementById('bulkAction');
        const selectedIdsInput = document.getElementById('selectedIds');
        
        bulkActionBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.getAttribute('data-bulk-action');
                const selected = [];
                
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        selected.push(checkbox.value);
                    }
                });
                
                if (selected.length === 0) {
                    alert('Pilih setidaknya satu item untuk dilakukan tindakan.');
                    return;
                }
                
                bulkActionInput.value = action;
                selectedIdsInput.value = selected.join(',');
                bulkActionForm.submit();
            });
        });
    }
}

/**
 * Show confirmation dialog
 * @param {string} message - Confirmation message
 * @param {function} callback - Function to call if confirmed
 */
function confirmAction(message, callback) {
    if (confirm(message)) {
        callback();
    }
}

/**
 * Format currency
 * @param {number} amount - Amount to format
 * @param {string} currency - Currency code
 * @returns {string} Formatted currency string
 */
function formatCurrency(amount, currency = 'IDR') {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: currency,
        minimumFractionDigits: 0
    }).format(amount);
}