/**
 * Copyright (c) Enalean, 2014. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Handle navbar events
 */
!function($) {
    var esc_keycode = 27;

    /**
     * @see http://css-tricks.com/snippets/jquery/make-jquery-contains-case-insensitive/
     */
    (function addCaseInsensitiveContainsSelector(){
        // NEW selector
        $.expr[':'].caseInsensitiveContains = function(a, i, m) {
          return $(a).text().toUpperCase()
              .indexOf(m[3].toUpperCase()) >= 0;
        };
    })()

    function filterProjects(value) {
        $('.projects-nav .dropdown-menu li.project:not(:caseInsensitiveContains(' + value + '))').hide();
        $('.projects-nav .dropdown-menu li.project:caseInsensitiveContains(' + value + ')').show();
    }

    function clearFilterProjects() {
        $('#filter-projects').val('');
        filterProjects('');
    }

    function initCustomScrollbar() {
        $('.projects-nav .dropdown-menu').jScrollPane({
            autoReinitialise: true,
            verticalGutter: 0
        });
    }

    $(document).ready(function() {
        var input_filter = $('#filter-projects');

        $('.projects-nav').click(function(event) {
            if (! $(this).hasClass('open')) {
                input_filter.focus();
                initCustomScrollbar();
            } else {
                clearFilterProjects();
            }
        });

        input_filter.click(function(event) {
            event.stopPropagation();
        });
        input_filter.keyup(function(event) {
            if (event.keyCode == esc_keycode) {
                clearFilterProjects();
            } else {
                filterProjects($(this).val());
            }
        });
    });
}(window.jQuery);