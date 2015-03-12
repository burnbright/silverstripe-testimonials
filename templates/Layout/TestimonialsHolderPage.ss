<h1 class="pagetitle">$Title</h1>
$Content
$Form

<% if $PaginatedTestimonials %>
	<div id="Testimonials" class="page">
		<% loop $PaginatedTestimonials %>
			<div id="Testimonial$ID" class="testimonial <% if Image %>image<% end_if %>">
				<% if Image %>
					<% with Image.SetWidth(112) %>
						<div class="image">	
							<img src="$URL"/>
						</div>
					<% end_with %>
				<% end_if %>
				<div class="text">
					<p>"$Content"
						<br/><span class="ref">$Name<% if Business %>, $Business<% end_if %>.</span>
					</p>
				</div>
				<div class="clear"><!--  --></div>
			</div>
		<% end_loop %>
        
        <% with $PaginatedTestimonials %>
            <p>
                <% if $MoreThanOnePage %>
                    <% if $NotFirstPage %>
                        <a class="prev" href="$PrevLink">Prev</a>
                    <% end_if %>
                    
                    <% loop $Pages %>
                        <% if $CurrentBool %>
                            $PageNum
                        <% else %>
                            <% if $Link %>
                                <a href="$Link">$PageNum</a>
                            <% else %>
                                ...
                            <% end_if %>
                        <% end_if %>
                    <% end_loop %>
                    
                    <% if $NotLastPage %>
                        <a class="next" href="$NextLink">Next</a>
                    <% end_if %>
                <% end_if %>
            </p>
        <% end_with %>
	</div>
<% end_if %>
